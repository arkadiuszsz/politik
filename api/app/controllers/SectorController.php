<?php

use Politik\Repositories\SectorRepositoryInterface;

class SectorController extends BaseController {

	public function __construct(SectorRepositoryInterface $sectors)
	{
		$this->sectors = $sectors;
	}

	public function getAllSectors()
	{
		return Response::json(
			$this->sectors->getAllSectors()
		);
	}
	
	public function getSector($id)
	{
		return Response::json(
			$this->sectors->getSector($id)
		);
	}

}
