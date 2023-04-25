<?php

namespace NickBeen\RickAndMortyPhpApi\Dto\Character;

class Location
{
	/** Name to the character's last known location */
	public readonly string $name;

	/** Url to the character's last known location endpoint */
	public readonly string $url;
}
