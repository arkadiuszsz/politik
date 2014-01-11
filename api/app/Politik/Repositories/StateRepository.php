<?php

namespace Politik\Repositories;

use Politik\Entities\State;

class StateRepository implements StateRepositoryInterface {

	public function getAllStatesWithSectors()
	{
		return State::has('sectors')->get();
	}

	public function getState($id)
	{
		return State::findOrFail($id);
	}

}
