<?php

use Politik\Entities\User;

/**
 * Class: UserTableSeeder
 *
 * @see Seeder
 */
class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('user')->delete();
		User::create(array(
			'nickname' => 'admin',
			'email' => 'admin@politik.orsn.eu.org',
			'password' => Hash::make('secret'),
			'sector_id' => 'PL-SK',
			'about' => "
				My life
				=======
				Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				Morbi tincidunt lobortis scelerisque. Cras ornare mollis magna,
				non dapibus mi. Sed luctus libero ut *condimentum* aliquam.
			",
		));
	}
}
