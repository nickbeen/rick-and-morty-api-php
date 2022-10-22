<?php

namespace NickBeen\RickAndMortyPhpApi\Contracts;

use NickBeen\RickAndMortyPhpApi\Episode;

interface EpisodeContract
{
	/** Url to API's episode resource. */
	public const RESOURCE = 'https://rickandmortyapi.com/api/episode';

	/**
	 * Get specified episode(s).
	 *
	 * @param ?int ...$id The id(s) of the episode
	 * @return object|array
	 */
	public function get(?int ...$id): object|array;

	/**
	 * Filter by the given episode code.
	 *
	 * @param string $episode The code of the episode
	 * @return Episode
	 */

	public function withEpisode(string $episode): Episode;
	/**
	 * Filter by the given name.
	 *
	 * @param string $name The name of the episode
	 * @return Episode
	 */
	public function withName(string $name): Episode;
}
