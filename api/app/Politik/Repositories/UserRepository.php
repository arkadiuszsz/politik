<?php

namespace Politik\Repositories;

use Politik\Entities\User;

class UserRepository implements UserRepositoryInterface {

	public function isEmailAvailable($email)
	{
		$count = User::where('email', '=', $email)->count();
		return $count === 0;
	}
}
