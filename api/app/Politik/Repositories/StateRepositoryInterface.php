<?php

namespace Politik\Repositories;

interface StateRepositoryInterface {

	public function getAllStatesWithSectors();
	public function getState($id);

}
