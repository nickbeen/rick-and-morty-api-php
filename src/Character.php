<?php

namespace NickBeen\RickAndMortyPhpApi;

use NickBeen\RickAndMortyPhpApi\Contracts\CharacterContract;
use NickBeen\RickAndMortyPhpApi\Enums\Gender;
use NickBeen\RickAndMortyPhpApi\Enums\Status;

class Character extends Base implements CharacterContract
{
	public function withGender(Gender $gender): Character
	{
		$this->filter['gender'] = strtolower($gender->value);
		return $this;
	}

	public function withName(string $name): Character
	{
		$this->filter['name'] = strtolower($name);
		return $this;
	}

	public function withSpecies(string $species): Character
	{
		$this->filter['species'] = strtolower($species);
		return $this;
	}

	public function withStatus(Status $status): Character
	{
		$this->filter['status'] = strtolower($status->value);
		return $this;
	}

	public function withType(string $type): Character
	{
		$this->filter['type'] = strtolower($type);
		return $this;
	}
}
