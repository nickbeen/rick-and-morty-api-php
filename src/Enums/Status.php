<?php

namespace NickBeen\RickAndMortyPhpApi\Enums;

use MyCLabs\Enum\Enum;

/**
 * @method static Status ALIVE()
 * @method static Status DEAD()
 * @method static Status UNKNOWN()
 */
final class Status extends Enum
{
	private const ALIVE = 'Alive';
	private const DEAD = 'Dead';
	private const UNKNOWN = 'unknown';
}
