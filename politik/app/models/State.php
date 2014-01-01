<?php

/**
 * Class: State
 *
 * @see Eloquent
 */
class State extends Eloquent {

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
		return $this->hasMany('Government');
	}

	/**
	 * One-to-many relationship with GovernmentElection.
	 */
	public function governmentElections()
	{
		return $this->hasMany('GovernmentElection');
	}

	/**
	 * One-to-many relationship with Passport.
	 */
	public function passports()
	{
		return $this->hasMany('Passport');
	}

	/**
	 * Many-to-many realtionship with User through Passport.
	 */
	public function citizens()
	{
		return $this->belongsToMany('User', 'Passport', 'state_id', 'owner_id');
	}
}
