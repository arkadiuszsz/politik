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
	
		$this->call('StateTableSeeder');
		$this->call('SectorTableSeeder');
		$this->call('NeighbourTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('GovernmentTableSeeder');
		$this->call('MinisterTableSeeder');
	}

}
