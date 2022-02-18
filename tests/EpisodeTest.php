<?php

namespace NickBeen\RickAndMortyPhpApi\Tests;

use NickBeen\RickAndMortyPhpApi\Episode;
use NickBeen\RickAndMortyPhpApi\Exceptions\NotFoundException;
use PHPUnit\Framework\TestCase;

class EpisodeTest extends TestCase
{
	/**
	 * @test
	 */
	public function it_can_list_all_episodes()
	{
		try {
			$episodes = (new Episode())
				->get();
		} catch (NotFoundException) {
			$episodes = null;
		}

		$this->assertIsObject($episodes);
		$this->assertNull($episodes->info->prev);
		$this->assertEquals('S01E01', $episodes->results[0]->episode);
	}

	/**
	 * @test
	 */
	public function it_can_list_all_episodes_on_second_page()
	{
		try {
			$episodes = (new Episode())
				->page(2)
				->get();
		} catch (NotFoundException) {
			$episodes = null;
		}

		$this->assertIsObject($episodes);
		$this->assertNotNull($episodes->info->prev);
		$this->assertEquals('S03E01', $episodes->results[1]->episode);
	}

	/**
	 * @test
	 * @throws NotFoundException
	 */
	public function it_cannot_show_a_nonexistent_episode_page()
	{
		$this->expectException(NotFoundException::class);

		$episodes = (new Episode())
			->page(999)
			->get();

		$this->assertIsNotObject($episodes);
	}

	/**
	 * @test
	 */
	public function it_can_list_a_single_episode()
	{
		try {
			$episode = (new Episode())
				->get(1);
		} catch (NotFoundException) {
			$episode = null;
		}

		$this->assertIsObject($episode);
		$this->assertEquals('Pilot', $episode->name);
		$this->assertEquals('December 2, 2013', $episode->air_date);
		$this->assertEquals('S01E01', $episode->episode);
		$this->assertIsArray($episode->characters);
	}

	/**
	 * @test
	 */
	public function it_can_list_multiple_episodes()
	{
		try {
			$list = (new Episode())
				->get(1,2);
		} catch (NotFoundException) {
			$list = null;
		}

		$this->assertIsArray($list);
		$this->assertCount(2, $list);
		$this->assertEquals('December 2, 2013', $list[0]->air_date);
	}

	/**
	 * @test
	 */
	public function it_can_filter_out_all_rick_episodes()
	{
		try {
			$episodes = (new Episode())
				->withName('Rick')
				->get();
		} catch (NotFoundException) {
			$episodes = null;
		}

		$this->assertIsObject($episodes);
		$this->assertIsArray($episodes->results);
		$this->assertEquals('Rick Potion #9',$episodes->results[0]->name);
	}
}
