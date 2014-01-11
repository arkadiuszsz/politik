<?php

namespace Politik\Entities;

/**
 * Class: State
 *
 * @see Eloquent
 */
class State extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'state';

	/**
	 * Returns current government of the state.
	 */
	public function getGovernmentAttribute()
	{
		return $this->governments()->first();
	}

	/**
	 * One-to-many relationship with Government.
	 */
	public function governments()
	{
		return $this->hasMany('Politik\Entities\Government');
	}

	/**
	 * One-to-many relationship with GovernmentElection.
	 */
	public function governmentElections()
	{
		return $this->hasMany('Politik\Entities\GovernmentElection');
	}

	/**
	 * One-to-many relationship with Passport.
	 */
	public function passports()
	{
		return $this->hasMany('Politik\Entities\Passport');
	}

	/**
	 * Many-to-many realtionship with User through Passport.
	 */
	public function citizens()
	{
		return $this->belongsToMany('Politik\Entities\User', 'Politik\Entities\Passport', 'state_id', 'owner_id');
	}

	/**
	 * One-to-many relationship with Sector.
	 */
	public function sectors()
	{
		return $this->hasMany('Politik\Entities\Sector');
	}
}
