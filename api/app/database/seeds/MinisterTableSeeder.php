<?php

use Politik\Entities\Minister;
use Politik\Entities\State;
use Politik\Entities\User;

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
			'government_id' => State::whereCode('POL')->first()->government->id,
			'minister_id' => User::whereEmail('admin@politik.orsn.eu.org')->first()->id,
			'is_prime_minister' => true,
		));
	}
}
