<?php

namespace NickBeen\RickAndMortyPhpApi\Dto;

class Character
{
	/** The id of the character */
	public readonly int $id;

	/** The name of the character */
	public readonly string $name;

	/** The status of the character ('Alive', 'Dead' or 'unknown') */
	public readonly string $status;

	/** The species of the character */
	public readonly string $species;

	/** The type or subspecies of the character */
	public readonly string $type;

	/** The gender of the character ('Female', 'Male', 'Genderless' or 'unknown') */
	public readonly string $gender;

	/** Name and link to the character's origin location endpoint */
	public readonly \NickBeen\RickAndMortyPhpApi\Dto\Character\Origin $origin;

	/** Name and link to the character's last known location endpoint */
	public readonly \NickBeen\RickAndMortyPhpApi\Dto\Character\Location $location;

	/** Link to the character's image. All images are 300x300px and most are medium shots or portraits since they are intended to be used as avatars */
	public readonly string $image;

	/** @var string[] List of episodes in which this character appeared */
	public readonly array $episode;

	/** Link to the character's own URL endpoint */
	public readonly string $url;

	/** Time at which the character was created in the database */
	public readonly string $created;
}
