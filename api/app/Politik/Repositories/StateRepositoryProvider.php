<?php

namespace Politik\Repositories;

use Illuminate\Support\ServiceProvider;

class StateRepositoryProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind(
			'Politik\Repositories\StateRepositoryInterface',
			'Politik\Repositories\StateRepository'
		);	
	}

}
