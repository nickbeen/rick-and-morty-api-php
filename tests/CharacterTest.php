<?php

namespace NickBeen\RickAndMortyPhpApi\Tests;

use NickBeen\RickAndMortyPhpApi\Character;
use NickBeen\RickAndMortyPhpApi\Enums\Gender;
use NickBeen\RickAndMortyPhpApi\Enums\Status;
use NickBeen\RickAndMortyPhpApi\Exceptions\NotFoundException;
use PHPUnit\Framework\TestCase;

class CharacterTest extends TestCase
{
	/**
	 * @test
	 */
	public function it_can_list_all_characters()
	{
		try {
			$characters = (new Character())
				->get();
		} catch (NotFoundException) {
			$characters = null;
		}

		$this->assertIsObject($characters);
		$this->assertNull($characters->info->prev);
		$this->assertEquals('Earth (C-137)', $characters->results[0]->origin->name);
	}

	/**
	 * @test
	 */
	public function it_can_list_all_characters_on_second_page()
	{
		try {
			$characters = (new Character())
				->page(2)
				->get();
		} catch (NotFoundException) {
			$characters = null;
		}

		$this->assertIsObject($characters);
		$this->assertNotNull($characters->info->prev);
		$this->assertEquals('Fish-Person', $characters->results[0]->type);
	}

	/**
	 * @test
	 * @throws NotFoundException
	 */
	public function it_cannot_show_a_nonexistent_character_page()
	{
		$this->expectException(NotFoundException::class);

		$characters = (new Character())
			->page(999)
			->get();

		$this->assertIsNotObject($characters);
	}

	/**
	 * @test
	 */
	public function it_can_list_a_single_character()
	{
		try {
			$character = (new Character())
				->get(242);
		} catch (NotFoundException) {
			$character = null;
		}

		$this->assertIsObject($character);
		$this->assertEquals('Meeseeks', $character->type);
		$this->assertIsObject($character->origin);
		$this->assertIsObject($character->location);
		$this->assertIsArray($character->episode);
	}

	/**
	 * @test
	 */
	public function it_can_list_multiple_characters()
	{
		try {
			$characters = (new Character())
				->get(1,2);
		} catch (NotFoundException) {
			$characters = null;
		}

		$this->assertIsArray($characters);
		$this->assertCount(2, $characters);
		$this->assertEquals(Gender::MALE(), $characters[0]->gender);
	}

	/**
	 * @test
	 */
	public function it_can_filter_out_all_alive_ricks()
	{
		try {
			$aliveRicks = (new Character())
				->withName('Rick')
				->withStatus(Status::ALIVE())
				->get();
		} catch (NotFoundException) {
			$aliveRicks = null;
		}

		$this->assertIsObject($aliveRicks);
		$this->assertIsArray($aliveRicks->results);
		$this->assertEquals('Rick Sanchez',$aliveRicks->results[0]->name);
	}
}
