<?php

use Politik\Repositories\SectorRepositoryInterface;
use Politik\Entities\State;
class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function __construct(SectorRepositoryInterface $sectors)
	{
		$this->sectors = $sectors;
	}

	public function showWelcome()
	{
		$state = State::where('code', '=', 'DEU')->first();
		return Response::json($state->sectors);
	}

}
