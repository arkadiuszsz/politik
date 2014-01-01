<?php

/**
 * Class: GovernmentTableSeeder
 *
 * @see Seeder
 */
class GovernmentTableSeeder extends Seeder {

	public function run()
	{
		DB::table('government')->delete();
		Government::create(array(
			'state_id' => State::whereCode('pol')->first()->id,
		));
	}
}
