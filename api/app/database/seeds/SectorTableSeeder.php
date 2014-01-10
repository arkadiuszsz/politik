<?php

use Politik\Entities\Sector;
use Politik\Entities\State;
/**
 * Class: SectorTableSeeder
 *
 * @see Seeder
 */
class SectorTableSeeder extends Seeder {

	public function run()
	{
		$sectors = array(
			'DE-BW'  => array('Baden-Württemberg', 'DEU'),
			'DE-BY'  => array('Bayern', 'DEU'),
			'DE-BE'  => array('Berlin', 'DEU'),
			'DE-BB'  => array('Brandenburg', 'DEU'),
			'DE-HB'  => array('Bremen', 'DEU'),
			'DE-HH'  => array('Hamburg', 'DEU'),
			'DE-HE'  => array('Hessen', 'DEU'),
			'DE-MV'  => array('Mecklenburg-Vorpommern', 'DEU'),
			'DE-NI'  => array('Niedersachsen', 'DEU'),
			'DE-NW'  => array('Nordrhein-Westfalen', 'DEU'),
			'DE-RP'  => array('Rheinland-Pfalz', 'DEU'),
			'DE-SL'  => array('Saarland', 'DEU'),
			'DE-SN'  => array('Sachsen', 'DEU'),
			'DE-ST'  => array('Sachsen-Anhalt', 'DEU'),
			'DE-SH'  => array('Schleswig-Holstein', 'DEU'),
			'DE-TH'  => array('Thüringen', 'DEU'),
			'PL-DS'  => array('Dolnośląskie', 'POL'),
			'PL-KP'  => array('Kujawsko-pomorskie', 'POL'),
			'PL-LU'  => array('Lubelskie', 'POL'),
			'PL-LB'  => array('Lubuskie', 'POL'),
			'PL-LD'  => array('Łódzkie', 'POL'),
			'PL-MA'  => array('Małopolskie', 'POL'),
			'PL-MZ'  => array('Mazowieckie', 'POL'),
			'PL-OP'  => array('Opolskie', 'POL'),
			'PL-PK'  => array('Podkarpackie', 'POL'),
			'PL-PD'  => array('Podlaskie', 'POL'),
			'PL-PM'  => array('Pomorskie', 'POL'),
			'PL-SL'  => array('Śląskie', 'POL'),
			'PL-SK'  => array('Świętokrzyskie', 'POL'),
			'PL-WN'  => array('Warmińsko-mazurskie', 'POL'),
			'PL-WP'  => array('Wielkopolskie', 'POL'),
			'PL-ZP'  => array('Zachodniopomorskie', 'POL'),
			'FR-A'  => array('Alsace', 'FRA'),
			'FR-B'  => array('Aquitaine', 'FRA'),
			'FR-C'  => array('Auvergne', 'FRA'),
			'FR-P'  => array('Basse-Normandie', 'FRA'),
			'FR-D'  => array('Bourgogne', 'FRA'),
			'FR-E'  => array('Bretagne', 'FRA'),
			'FR-F'  => array('Centre', 'FRA'),
			'FR-G'  => array('Champagne-Ardenne', 'FRA'),
			'FR-I'  => array('Franche-Comté', 'FRA'),
			'FR-Q'  => array('Haute-Normandie', 'FRA'),
			'FR-J'  => array('Île-de-France', 'FRA'),
			'FR-K'  => array('Languedoc-Roussillon', 'FRA'),
			'FR-L'  => array('Limousin', 'FRA'),
			'FR-M'  => array('Lorraine', 'FRA'),
			'FR-N'  => array('Midi-Pyrénées', 'FRA'),
			'FR-O'  => array('Nord-Pas-de-Calais', 'FRA'),
			'FR-R'  => array('Pays de la Loire', 'FRA'),
			'FR-S'  => array('Picardie', 'FRA'),
			'FR-T'  => array('Poitou-Charentes', 'FRA'),
			'FR-U'  => array('Provence-Alpes-Côte d\'Azur', 'FRA'),
			'FR-V'  => array('Rhône-Alpes', 'FRA')
		);

		DB::table('sector')->delete();
		DB::transaction(function() use ($sectors) {
			foreach($sectors as $iso => $array)
			{
				$name = $array[0];
				$state_code = $array[1];
				$state = State::where('code', '=', $state_code)->first();
				$sector = Sector::create(array(
					'id' => $iso,
					'name' => $name,
					'state_id' => $state->id
				));
			}
		});
	}
}
