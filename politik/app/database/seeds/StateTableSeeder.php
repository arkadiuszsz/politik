<?php

/**
 * Class: StateTableSeeder
 *
 * @see Seeder
 */
class StateTableSeeder extends Seeder {

	public function run()
	{
		DB::table('state')->delete();
		$poland = State::create(array(
			'code' => 'pol',
			'name' => 'Rzeczpospolita Polska',
		));
		Sector::whereBetween('x', array(1, 3))
			->whereBetween('y', array(1, 3))
			->get()
			->each(function ($sector) use ($poland) {
				$sector->state = $poland;
			});
	}
}
