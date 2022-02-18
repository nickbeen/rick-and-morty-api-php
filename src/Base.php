<?php

namespace NickBeen\RickAndMortyPhpApi;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ServerException;
use JsonMapper;
use JsonMapper_Exception;
use NickBeen\RickAndMortyPhpApi\Exceptions\NotFoundException;
use ReflectionClass;

class Base
{
	/** @var string Name of extending class. */
	private string $class;

	/** @var string Fully qualified namespace of Dto class. */
	private string $dtoClass;

	/** @var array Storage for filtering characters, episodes or locations. */
	protected array $filter = [];

	/**
	 * Store name and namespace of extending class.
	 */
	public function __construct()
	{
		$reflection_class = new ReflectionClass(get_called_class());

		$this->class = $reflection_class->getShortName();

		$this->dtoClass = $reflection_class->getNamespaceName()  . "\Dto\\" . $this->class;
	}

	/**
	 * Retrieve a single, multiple or a collection of results.
	 *
	 * Leave empty to retrieve a collection object with results.
	 * Add a comma separated list of ids to retrieve one or
	 * an array with more results.
	 *
	 * @param ?int ...$id
	 * @return object|array
	 * @throws NotFoundException
	 */
	public function get(?int ...$id): object|array
	{
		// collection = empty $id || !empty $filter
		// array = count($id) > 1
		// single = count($id) === 1

		$client = new Client(['verify' => false]);
		$mapper = new JsonMapper();
		$mapper->bRemoveUndefinedAttributes = true;

		switch (true) {
			case (empty($id)):
			case (!empty($this->filter)):
				$this->dtoClass = "\NickBeen\RickAndMortyPhpApi\Dto\Collection\\$this->class";
				break;
			case (count($id) > 1):
				$mapper->bEnforceMapType = false;
				break;
		}

		try {
			$response = $client->get(
				$this::class::RESOURCE . ($id ? '/' . implode(',',$id) : '?' . http_build_query($this->filter))
			);
		}
		catch (ServerException) {
			throw NotFoundException::resourceUnavailable();
		}
		catch (ClientException) {
			throw NotFoundException::resourceNotFound($this->class);
		}
		catch (GuzzleException | Exception $e) {
			throw NotFoundException::invalidArgument($e->getMessage());
		}

		try {
			if (count($id) > 1) {
				return $mapper->mapArray(json_decode($response->getBody()), [],$this->dtoClass);
			} else {
				$mapper->bEnforceMapType = false; // eh?
				return $mapper->map(json_decode($response->getBody()), new $this->dtoClass());
			}
		} catch (JsonMapper_Exception | Exception $e) {
			throw NotFoundException::invalidArgument($e->getMessage());
		}
	}

	/**
	 * Get results from specified page number.
	 *
	 * @param int $number
	 * @return $this
	 */
	public function page(int $number): self
	{
		$this->filter['page'] = $number;
		return $this;
	}
}
