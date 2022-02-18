<?php

namespace NickBeen\RickAndMortyPhpApi\Enums;

use MyCLabs\Enum\Enum;

/**
 * @method static Gender FEMALE()
 * @method static Gender GENDERLESS()
 * @method static Gender MALE()
 * @method static Gender UNKNOWN()
 */
final class Gender extends Enum
{
	private const FEMALE = 'Female';
	private const GENDERLESS = 'Genderless';
	private const MALE = 'Male';
	private const UNKNOWN = 'unknown';
}
