<?php

namespace NickBeen\RickAndMortyPhpApi;

use NickBeen\RickAndMortyPhpApi\Contracts\LocationContract;

class Location extends Base implements LocationContract
{
	public function withDimension(string $dimension): Location
	{
		$this->filter['dimension'] = strtolower($dimension);
		return $this;
	}

	public function withName(string $name): Location
	{
		$this->filter['name'] = strtolower($name);
		return $this;
	}

	public function withType(string $type): Location
	{
		$this->filter['type'] = strtolower($type);
		return $this;
	}
}
