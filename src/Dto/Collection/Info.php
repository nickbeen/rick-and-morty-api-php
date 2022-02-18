<?php

namespace NickBeen\RickAndMortyPhpApi\Dto\Collection;

class Info
{
	/** The length of the response */
	public int $count;

	/** The amount of pages */
	public int $pages;

	/** Link to the next page (if it exists) */
	public ?string $next;

	/** Link to the previous page (if it exists) */
	public ?string $prev;
}
