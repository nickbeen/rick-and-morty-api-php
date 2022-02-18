<?php

namespace NickBeen\RickAndMortyPhpApi\Tests;

use NickBeen\RickAndMortyPhpApi\Exceptions\NotFoundException;
use NickBeen\RickAndMortyPhpApi\Location;
use PHPUnit\Framework\TestCase;

class LocationTest extends TestCase
{
	/**
	 * @test
	 */
	public function it_can_list_all_locations()
	{
		try {
			$locations = (new Location())
				->get();
		} catch (NotFoundException) {
			$locations = null;
		}

		$this->assertIsObject($locations);
		$this->assertNull($locations->info->prev);
		$this->assertEquals('Dimension C-137', $locations->results[0]->dimension);
	}

	/**
	 * @test
	 */
	public function it_can_list_all_locations_on_second_page()
	{
		try {
			$locations = (new Location())
				->page(2)
				->get();
		} catch (NotFoundException) {
			$locations = null;
		}

		$this->assertIsObject($locations);
		$this->assertNotNull($locations->info->prev);
		$this->assertEquals('Dimension', $locations->results[0]->type);
	}

	/**
	 * @test
	 * @throws NotFoundException
	 */
	public function it_cannot_show_a_nonexistent_location_page()
	{
		$this->expectException(NotFoundException::class);

		$locations = (new Location())
			->page(999)
			->get();

		$this->assertIsNotObject($locations);
	}

	/**
	 * @test
	 */
	public function it_can_list_a_single_location()
	{
		try {
			$location = (new Location())
				->get(1);
		} catch (NotFoundException) {
			$location = null;
		}

		$this->assertIsObject($location);
		$this->assertEquals('Earth (C-137)', $location->name);
		$this->assertEquals('Planet', $location->type);
		$this->assertEquals('Dimension C-137', $location->dimension);
		$this->assertIsArray($location->residents);
	}

	/**
	 * @test
	 */
	public function it_can_list_multiple_locations()
	{
		try {
			$locations = (new Location())
				->get(3,4,5);
		} catch (NotFoundException) {
			$locations = null;
		}

		$this->assertIsArray($locations);
		$this->assertCount(3, $locations);
		$this->assertEquals('Space station', $locations[0]->type);
	}

	/**
	 * @test
	 */
	public function it_can_filter_out_all_locations_in_dimension_c137()
	{
		try {
			$locations = (new Location())
				->withDimension('Dimension C-137')
				->get();
		} catch (NotFoundException) {
			$locations = null;
		}

		$this->assertIsObject($locations);
		$this->assertIsArray($locations->results);
		$this->assertEquals('Planet',$locations->results[0]->type);
	}
}
