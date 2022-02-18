<?php

namespace NickBeen\RickAndMortyPhpApi\Tests;

use NickBeen\RickAndMortyPhpApi\Api;
use NickBeen\RickAndMortyPhpApi\Contracts\CharacterContract;
use NickBeen\RickAndMortyPhpApi\Contracts\EpisodeContract;
use NickBeen\RickAndMortyPhpApi\Contracts\LocationContract;
use NickBeen\RickAndMortyPhpApi\Exceptions\NotFoundException;
use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
	/**
	 * @test
	 */
	public function it_can_list_the_api()
	{
		try {
			$api = (new Api())
				->get();
		} catch (NotFoundException) {
			$api = null;
		}

		$this->assertIsObject($api);
		$this->assertEquals(CharacterContract::RESOURCE, $api->characters);
		$this->assertEquals(EpisodeContract::RESOURCE, $api->episodes);
		$this->assertEquals(LocationContract::RESOURCE, $api->locations);
	}
}
