<?php

namespace Politik\Repositories;

use Illuminate\Support\ServiceProvider;

class SectorRepositoryProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind(
			'Politik\Repositories\SectorRepositoryInterface',
			'Politik\Repositories\SectorRepository'
		);	
	}

}
