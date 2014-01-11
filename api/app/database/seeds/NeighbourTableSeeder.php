<?php

use Politik\Entities\Sector;

/**
 * Class: NeighbourTableSeeder
 *
 * @see Seeder
 */
class NeighbourTableSeeder extends Seeder {

	public function run()
	{
		$borders = array(
			'DE-BW' => array('DE-HE', 'DE-BY', 'FR-A', 'FR-M', 'DE-RP'),
			'DE-BY' => array('DE-TH', 'DE-SN', 'DE-BW', 'DE-HE'),
			'DE-BE' => array('DE-BB'),
			'DE-BB' => array('DE-BE', 'DE-MV', 'PL-ZP', 'PL-LB', 'DE-SN', 'DE-ST', 'DE-NI'),
			'DE-HB' => array('DE-NI'),
			'DE-HH' => array('DE-SH', 'DE-NI'),
			'DE-HE' => array('DE-NI', 'DE-TH', 'DE-BY', 'DE-BW', 'DE-RP', 'DE-NW'),
			'DE-MV' => array('PL-ZP', 'DE-BB', 'DE-NI', 'DE-SH'),
			'DE-NI' => array('DE-HB', 'DE-SH', 'DE-HH', 'DE-MV', 'DE-BB', 'DE-ST', 'DE-TH', 'DE-HE', 'DE-NW'),
			'DE-NW' => array('DE-NI', 'DE-HE', 'DE-RP'),
			'DE-RP' => array('DE-NW', 'DE-HE', 'DE-BW', 'FR-A', 'DE-SL'),
			'DE-SL' => array('DE-RP', 'FR-M'),
			'DE-SN' => array('DE-BB', 'PL-LB', 'PL-DS', 'DE-BY', 'DE-TH', 'DE-ST'),
			'DE-ST' => array('DE-BB', 'DE-SN', 'DE-TH', 'DE-NI'),
			'DE-SH' => array('DE-MV', 'DE-NI', 'DE-HH'),
			'DE-TH' => array('DE-ST', 'DE-SN', 'DE-BY', 'DE-HE', 'DE-NI'),
			'PL-DS' => array('PL-LB', 'PL-WP', 'PL-OP', 'DE-SN'),
			'PL-KP' => array('PL-PM', 'PL-WN', 'PL-MZ', 'PL-LD', 'PL-WP'),
			'PL-LU' => array('PL-PD', 'PL-PK', 'PL-SK', 'PL-MZ'),
			'PL-LB' => array('PL-ZP', 'PL-WP', 'PL-DS', 'DE-SN', 'DE-BB'),
			'PL-LD' => array('PL-KP', 'PL-MZ', 'PL-SK', 'PL-SL', 'PL-OP', 'PL-WP'),
			'PL-MA' => array('PL-SK', 'PL-PK', 'PL-SL'),
			'PL-MZ' => array('PL-WN', 'PL-PD', 'PL-LU', 'PL-SK', 'PL-LD', 'PL-KP'),
			'PL-OP' => array('PL-WP', 'PL-LD', 'PL-SL', 'PL-DS'),
			'PL-PK' => array('PL-LU', 'PL-MA', 'PL-SK'),
			'PL-PD' => array('PL-LU', 'PL-MZ', 'PL-WN'),
			'PL-PM' => array('PL-WN', 'PL-KP', 'PL-WP', 'PL-ZP'),
			'PL-SL' => array('PL-LD', 'PL-SK', 'PL-MA', 'PL-OP'),
			'PL-SK' => array('PL-MZ', 'PL-LU', 'PL-PK', 'PL-MA', 'PL-SL', 'PL-LD'),
			'PL-WN' => array('PL-PD', 'PL-MZ', 'PL-KP', 'PL-PM'),
			'PL-WP' => array('PL-PM', 'PL-KP', 'PL-LD', 'PL-OP', 'PL-DS', 'PL-LB', 'PL-ZP'),
			'PL-ZP' => array('PL-PM', 'PL-WP', 'PL-LB', 'DE-BB', 'DE-MV'),
			'FR-A' => array('DE-RP', 'DE-BW', 'FR-I', 'FR-M'),
			'FR-B' => array('FR-T', 'FR-L', 'FR-N'),
			'FR-C' => array('FR-D', 'FR-V', 'FR-K', 'FR-N', 'FR-L', 'FR-F'),
			'FR-P' => array('FR-Q', 'FR-F', 'FR-R', 'FR-E'),
			'FR-D' => array('FR-G', 'FR-I', 'FR-V', 'FR-C', 'FR-F', 'FR-J'),
			'FR-E' => array('FR-P', 'FR-R'),
			'FR-F' => array('FR-Q', 'FR-J', 'FR-D', 'FR-C', 'FR-L', 'FR-T', 'FR-R', 'FR-P'),
			'FR-G' => array('FR-M', 'FR-I', 'FR-D', 'FR-J', 'FR-S'),
			'FR-I' => array('FR-M', 'FR-A', 'FR-V', 'FR-D', 'FR-G'),
			'FR-Q' => array('FR-S', 'FR-J', 'FR-F', 'FR-P'),
			'FR-J' => array('FR-S', 'FR-G', 'FR-D', 'FR-F', 'FR-Q'),
			'FR-K' => array('FR-C', 'FR-V', 'FR-U', 'FR-N'),
			'FR-L' => array('FR-F', 'FR-C', 'FR-N', 'FR-B', 'FR-T'),
			'FR-M' => array('DE-SL', 'DE-RP', 'FR-A', 'FR-I', 'FR-G'),
			'FR-N' => array('FR-L', 'FR-C', 'FR-K', 'FR-B'),
			'FR-O' => array('FR-S'),
			'FR-R' => array('FR-P', 'FR-F', 'FR-T', 'FR-E'),
			'FR-S' => array('FR-O', 'FR-G', 'FR-J', 'FR-Q'),
			'FR-T' => array('FR-R', 'FR-F', 'FR-L', 'FR-B'),
			'FR-U' => array('FR-V', 'FR-K'),
			'FR-V' => array('FR-D', 'FR-I', 'FR-U', 'FR-K', 'FR-C')
		);

		DB::table('neighbour')->delete();
		DB::transaction(function() use ($borders) {
			foreach($borders as $sector_id => $neighbours)
			{
				Sector::find($sector_id)->neighbours()->sync($neighbours);
			}
		});
	}
}
