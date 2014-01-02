<?php

/**
 * Class: Government
 *
 * @see Eloquent
 */
class Government extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'government';
	
	/**
	 * Indicates that the model should be soft-deleted by default.
	 *
	 * @var mixed
	 */
	protected $softDelete = true;

	/**
	 * Many-to-one relationship with State.
	 */
	public function state()
	{
		return $this->belongsTo('State');
	}

	/**
	 * One-to-one relationship with GovernmentElection.
	 */
	public function election()
	{
		return $this->hasOne('GovernmentElection', 'election_id');
	}

	/**
	 * One-to-many relationship with Minister.
	 */
	public function ministers()
	{
		return $this->hasMany('Minister');
	}
}
