<?php

use Politik\Repositories\UserRepositoryInterface;

class UserController extends \BaseController {

	public function __construct(UserRepositoryInterface $users)
	{
		$this->users = $users;
		$this->beforeFilter('auth', array('only' => array('index', 'logout')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json(Auth::user());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Response::json($this->users->getUser($id));
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

	public function login()
	{
		$credentials = Input::only('email', 'password');
		if (Auth::attempt($credentials) === false)
			App::abort(401);

		return Response::json(Auth::user());
	}

	public function logout()
	{
		Auth::logout();
		App::abort(204);
	}

	public function isEmailAvailable()
	{
		$email = Input::get('email');
		return Response::json(array(
			'isValid' => $this->users->isEmailAvailable($email)
		));
	}

}
