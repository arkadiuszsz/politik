<?php

/**
 * Class: GovernmentElection
 *
 * @see Eloquent
 */
class GovernmentElection extends Eloquent {

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
		return $this->belongsTo('State');
	}

	/**
	 * One-to-one relationship with Government.
	 */
	public function government()
	{
		return $this->belongsTo('Government');
	}

	/**
	 * One-to-many relationship with GovernmentElectionCandidate.
	 */
	public function candidates()
	{
		return $this->hasMany('GovernmentElectionCandidate', 'election_id');
	}
}
