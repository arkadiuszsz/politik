<?php

/**
 * Class: Passport
 *
 * @see Eloquent
 */
class Passport extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'passport';

	/**
	 * Many-to-one relationship with User.
	 */
	public function owner()
	{
		return $this->belongsTo('User', 'owner_id');
	}

	/**
	 * Many-to-one relationship with State.
	 */
	public function state()
	{
		return $this->belongsTo('State');
	}
}
