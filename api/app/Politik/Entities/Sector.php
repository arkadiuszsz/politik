<?php

namespace Politik\Entities;

/**
 * Class: Sector
 *
 * @see Eloquent
 */
class Sector extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sector';

	/**
	 * Many-to-one relationship with State.
	 */
	public function state()
	{
		return $this->belongsTo('Politik\Entities\State');
	}

	/**
	 * One-to-many relationship with User.
	 */
	public function inhabitants()
	{
		return $this->hasMany('Politik\Entities\User');
	}

	/**
	 * Many-to-many relationship with neighbouring Sector(s).
	 */
	public function neighbours()
	{
		return $this->belongsToMany('Politik\Entities\Sector', 'neighbour', 'sector_id', 'neighbour_id');
	}
}
