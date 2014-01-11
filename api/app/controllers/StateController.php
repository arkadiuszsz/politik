<?php

use Politik\Repositories\StateRepositoryInterface;

class StateController extends BaseController {

	public function __construct(StateRepositoryInterface $states)
	{
		$this->states = $states;
	}

	public function getAllStatesWithSectors()
	{
		return Response::json(
			$this->states->getAllStatesWithSectors()
		);
	}
	
	public function getState($id)
	{
		return Response::json(
			$this->states->getState($id)
		);
	}

}
