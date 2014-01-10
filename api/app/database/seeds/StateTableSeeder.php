<?php

use Politik\Entities\State;
use Politik\Entities\Sector;

/**
 * Class: StateTableSeeder
 *
 * @see Seeder
 */
class StateTableSeeder extends Seeder {

	public function run()
	{
		DB::table('state')->delete();
		State::create(array(
			'code' => 'POL',
			'name' => 'Rzeczpospolita Polska',
		));
		State::create(array(
			'code' => 'DEU',
			'name' => 'Bundesrepublik Deutschland',
		));
		State::create(array(
			'code' => 'FRA',
			'name' => 'République française',
		));
	}
}
