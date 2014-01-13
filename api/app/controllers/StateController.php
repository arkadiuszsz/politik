<?php

use Politik\Repositories\StateRepositoryInterface;

class StateController extends \BaseController {

	public function __construct(StateRepositoryInterface $states)
	{
		$this->states = $states;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json(
			$this->states->getAllStatesWithSectors()
		);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Response::json(
			$this->states->getState($id)
		);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

}
