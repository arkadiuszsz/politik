<?php

/**
 * Class: Sector
 *
 * @see Eloquent
 */
class Sector extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sector';

	/**
	 * scopeCoordinates
	 *
	 * @param mixed $query
	 * @param mixed $x
	 * @param mixed $y
	 */
	public function scopeCoordinates($query, $x, $y)
	{
		return $query->whereX($x)->whereY($y);
	}

	/**
	 * Many-to-one relationship with State.
	 */
	public function state()
	{
		return $this->belongsTo('State');
	}

	/**
	 * One-to-many relationship with User.
	 */
	public function inhabitants()
	{
		return $this->hasMany('User');
	}
}
