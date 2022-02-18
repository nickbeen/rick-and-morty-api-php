<?php

namespace NickBeen\RickAndMortyPhpApi\Contracts;

interface ApiContract
{
	/** Url to all available API's resources. */
	public const RESOURCE = 'https://rickandmortyapi.com/api';

	/**
	 * Get all available API's resources.
	 *
	 * @return ?object
	 */
	public function get(): ?object;
}
