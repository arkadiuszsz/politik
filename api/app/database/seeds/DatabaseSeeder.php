<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('SectorTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('StateTableSeeder');
		$this->call('GovernmentTableSeeder');
		$this->call('MinisterTableSeeder');
	}

}
