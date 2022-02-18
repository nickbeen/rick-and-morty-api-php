<?php

namespace NickBeen\RickAndMortyPhpApi;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JsonMapper;
use JsonMapper_Exception;
use NickBeen\RickAndMortyPhpApi\Contracts\ApiContract;
use NickBeen\RickAndMortyPhpApi\Dto\Api as ApiDto;
use NickBeen\RickAndMortyPhpApi\Exceptions\NotFoundException;

class Api implements ApiContract
{
	/**
	 * @throws NotFoundException
	 */
	public function get(): ?object
	{
		$client = new Client(['verify' => false]);

		try {
			$response = $client->get(self::RESOURCE);
		}
		catch (GuzzleException) {
			throw NotFoundException::resourceUnavailable();
		} catch (Exception) {
			return null;
		}

		$mapper = new JsonMapper();
		try {
			return $mapper->map(json_decode($response->getBody()), new ApiDto());
		} catch (JsonMapper_Exception) {
			return null;
		}
	}
}
