<?php

namespace Politik\Entities;

/**
 * Class: GovernmentElection
 *
 * @see Eloquent
 */
class GovernmentElection extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'government_election';

	/**
	 * Many-to-one relationship with State.
	 */
	public function state()
	{
		return $this->belongsTo('Politik\Entities\State');
	}

	/**
	 * One-to-one relationship with Government.
	 */
	public function government()
	{
		return $this->belongsTo('Politik\Entities\Government');
	}

	/**
	 * One-to-many relationship with GovernmentElectionCandidate.
	 */
	public function candidates()
	{
		return $this->hasMany('Politik\Entities\GovernmentElectionCandidate', 'election_id');
	}
}
