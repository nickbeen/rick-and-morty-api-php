<?php

namespace NickBeen\RickAndMortyPhpApi\Dto\Collection;

class Episode
{
	public Info $info;

	/** @var \NickBeen\RickAndMortyPhpApi\Dto\Episode[] */
	public array $results;
}
