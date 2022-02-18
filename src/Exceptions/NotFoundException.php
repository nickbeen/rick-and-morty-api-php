<?php

namespace NickBeen\RickAndMortyPhpApi\Exceptions;

use Exception;

class NotFoundException extends Exception
{
	/**
	 * Exception thrown when invalid argument is used.
	 *
	 * @param string $message
	 * @return static
	 */
	public static function invalidArgument(string $message): static
	{
		return new static($message);
	}

	/**
	 * Exception thrown when resource cannot be found.
	 *
	 * @param string $class
	 * @return static
	 */
	public static function resourceNotFound(string $class): static
	{
		return new static("$class cannot be found.");
	}

	/**
	 * Exception thrown when resource is unavailable.
	 *
	 * @return static
	 */
	public static function resourceUnavailable(): static
	{
		return new static("The Rick and Morty API is unavailable.");
	}
}
