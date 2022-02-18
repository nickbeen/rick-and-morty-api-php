<?php

namespace NickBeen\RickAndMortyPhpApi\Dto;

class Character
{
	/** The id of the character */
	public int $id;

	/** The name of the character */
	public string $name;

	/** The status of the character ('Alive', 'Dead' or 'unknown') */
	public string $status;

	/** The species of the character */
	public string $species;

	/** The type or subspecies of the character */
	public string $type;

	/** The gender of the character ('Female', 'Male', 'Genderless' or 'unknown') */
	public string $gender;

	/** Name and link to the character's origin location endpoint */
	public \NickBeen\RickAndMortyPhpApi\Dto\Character\Origin $origin;

	/** Name and link to the character's last known location endpoint */
	public \NickBeen\RickAndMortyPhpApi\Dto\Character\Location $location;

	/** Link to the character's image. All images are 300x300px and most are medium shots or portraits since they are intended to be used as avatars */
	public string $image;

	/** @var string[] List of episodes in which this character appeared */
	public array $episode;

	/** Link to the character's own URL endpoint */
	public string $url;

	/** Time at which the character was created in the database */
	public string $created;
}
