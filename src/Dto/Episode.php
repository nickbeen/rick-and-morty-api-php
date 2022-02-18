<?php

namespace NickBeen\RickAndMortyPhpApi\Dto;

class Episode
{
	/** The id of the episode */
	public int $id;

	/** The name of the episode */
	public string $name;

	/** The air date of the episode */
	public string $air_date;

	/** The code of the episode */
	public string $episode;

	/** @var string[] List of characters who have been seen in the episode */
	public array $characters;

	/** Link to the episode's own endpoint */
	public string $url;

	/** Time at which the episode was created in the database */
	public string $created;
}
