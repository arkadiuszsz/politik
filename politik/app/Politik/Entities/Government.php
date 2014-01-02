<?php

namespace Politik\Entities;

/**
 * Class: Government
 *
 * @see Eloquent
 */
class Government extends \Eloquent {

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
		return $this->belongsTo('Politik\Entities\State');
	}

	/**
	 * One-to-one relationship with GovernmentElection.
	 */
	public function election()
	{
		return $this->hasOne('Politik\Entities\GovernmentElection', 'election_id');
	}

	/**
	 * One-to-many relationship with Minister.
	 */
	public function ministers()
	{
		return $this->hasMany('Politik\Entities\Minister');
	}
}
