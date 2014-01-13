<?php

namespace Politik\Repositories;

use Illuminate\Support\ServiceProvider;

class UserRepositoryProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind(
			'Politik\Repositories\UserRepositoryInterface',
			'Politik\Repositories\UserRepository'
		);	
	}

}
