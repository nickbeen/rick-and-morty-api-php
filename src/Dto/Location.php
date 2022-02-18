<?php

namespace NickBeen\RickAndMortyPhpApi\Dto;

class Location
{
	/** The id of the location */
	public int $id;

	/** The name of the location */
	public string $name;

	/** The type of the location */
	public string $type;

	/** The dimension in which the location is located */
	public string $dimension;

	/** @var string[] List of characters who have been last seen in the location */
	public array $residents;

	/** Link to the location's own endpoint */
	public string $url;

	/** Time at which the location was created in the database */
	public string $created;
}
