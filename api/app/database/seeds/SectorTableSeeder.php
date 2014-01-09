<?php

/**
 * Class: SectorTableSeeder
 *
 * @see Seeder
 */
class SectorTableSeeder extends Seeder {

	public function run()
	{
		DB::table('sector')->delete();

		DB::transaction(function() {
			/* map size */
			$x_size = 64;
			$y_size = 64;

			for($x = 0; $x < $x_size; $x++)
			for($y = 0; $y < $y_size; $y++)
			{
				Sector::create(array(
					'x' => $x,
					'y' => $y
				));
			}
		});
	}
}
