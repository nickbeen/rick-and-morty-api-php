<?php

namespace NickBeen\RickAndMortyPhpApi\Dto\Collection;

class Info
{
	/** The length of the response */
	public readonly int $count;

	/** The amount of pages */
	public readonly int $pages;

	/** Link to the next page (if it exists) */
	public readonly ?string $next;

	/** Link to the previous page (if it exists) */
	public readonly ?string $prev;
}
