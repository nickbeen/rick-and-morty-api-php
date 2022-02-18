<?php

namespace NickBeen\RickAndMortyPhpApi\Contracts;

use NickBeen\RickAndMortyPhpApi\Location;

interface LocationContract
{
	/** Url to API's location resource. */
	public const RESOURCE = 'https://rickandmortyapi.com/api/location';

	/**
	 * Get specified location(s).
	 *
	 * @param ?int ...$id The id of the location
	 * @return object|array
	 */
	public function get(?int ...$id): object|array;

	/**
	 * Filter by the given dimension.
	 *
	 * @param string $dimension The dimension in which the location is located
	 * @return Location
	 */

	public function withDimension(string $dimension): Location;
	/**
	 * Filter by the given name.
	 *
	 * @param string $name The name of the location
	 * @return Location
	 */
	public function withName(string $name): Location;

	/**
	 * Filter by the given type.
	 *
	 * @param string $type The type of the location
	 * @return Location
	 */
	public function withType(string $type): Location;
}
