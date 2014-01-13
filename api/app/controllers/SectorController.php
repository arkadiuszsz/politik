<?php

use Politik\Repositories\SectorRepositoryInterface;

class SectorController extends \BaseController {
	
	public function __construct(SectorRepositoryInterface $sectors)
	{
		$this->sectors = $sectors;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json(
			$this->sectors->getAllSectors()
		);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  string  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Response::json(
			$this->sectors->getSector($id)
		);
	}

}
