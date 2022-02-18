<?php

namespace NickBeen\RickAndMortyPhpApi\Contracts;

use NickBeen\RickAndMortyPhpApi\Character;
use NickBeen\RickAndMortyPhpApi\Enums\Gender;
use NickBeen\RickAndMortyPhpApi\Enums\Status;

interface CharacterContract
{
	/** Url to API's character resource. */
	public const RESOURCE = 'https://rickandmortyapi.com/api/character';

	/**
	 * Get specified character(s).
	 *
	 * @param ?int ...$id The id(s) of the character
	 * @return object|array
	 */
	public function get(?int ...$id): object|array;

	/**
	 * Filter by the given gender.
	 *
	 * @param Gender $gender The gender of the character ('Female', 'Male', 'Genderless' or 'unknown')
	 * @return Character
	 */
	public function withGender(Gender $gender): Character;

	/**
	 * Filter by the given name.
	 *
	 * @param string $name The name of the character
	 * @return Character
	 */
	public function withName(string $name): Character;

	/**
	 * Filter by the given species.
	 *
	 * @param string $species The species of the character
	 * @return Character
	 */
	public function withSpecies(string $species): Character;

	/**
	 * Filter by the given status.
	 *
	 * @param Status $status The status of the character ('Alive', 'Dead' or 'unknown')
	 * @return Character
	 */
	public function withStatus(Status $status): Character;

	/**
	 * Filter by the given type.
	 *
	 * @param string $type The type or subspecies of the character
	 * @return Character
	 */
	public function withType(string $type): Character;
}
