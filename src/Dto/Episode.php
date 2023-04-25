<?php

namespace NickBeen\RickAndMortyPhpApi\Dto;

class Episode
{
	/** The id of the episode */
	public readonly int $id;

	/** The name of the episode */
	public readonly string $name;

	/** The air date of the episode */
	public readonly string $air_date;

	/** The code of the episode */
	public readonly string $episode;

	/** @var string[] List of characters who have been seen in the episode */
	public readonly array $characters;

	/** Link to the episode's own endpoint */
	public readonly string $url;

	/** Time at which the episode was created in the database */
	public readonly string $created;
}
