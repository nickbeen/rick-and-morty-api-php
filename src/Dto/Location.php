<?php

namespace NickBeen\RickAndMortyPhpApi\Dto;

class Location
{
	/** The id of the location */
	public readonly int $id;

	/** The name of the location */
	public readonly string $name;

	/** The type of the location */
	public readonly string $type;

	/** The dimension in which the location is located */
	public readonly string $dimension;

	/** @var string[] List of characters who have been last seen in the location */
	public readonly array $residents;

	/** Link to the location's own endpoint */
	public readonly string $url;

	/** Time at which the location was created in the database */
	public readonly string $created;
}
