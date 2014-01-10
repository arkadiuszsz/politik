<?php

namespace Politik\Repositories;

interface SectorRepositoryInterface {

	public function alterState($id, $state);
	public function getAllSectors();
	public function getSector($id);

}
