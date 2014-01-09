<?php

/**
 * Class: MinisterTableSeeder
 *
 * @see Seeder
 */
class MinisterTableSeeder extends Seeder {

	public function run()
	{
		DB::table('minister')->delete();
		Minister::create(array(
			'government_id' => State::whereCode('pol')->first()->government->id,
			'minister_id' => User::whereEmail('admin@politik.orsn.eu.org')->first()->id,
			'is_prime_minister' => true,
		));
	}
}
