<?php

namespace Politik\Entities;

/**
 * Class: GovernmentElectionCandidate
 *
 * @see Eloquent
 */
class GovernmentElectionCandidate extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'government_election_candidate';

	/**
	 * Many-to-one relationship with GovernmentElection.
	 */
	public function election()
	{
		return $this->belongsTo('Politik\Entities\GovernmentElection', 'election_id');
	}

	/**
	 * One-to-many relationship with GovernmentElectionVote.
	 */
	public function votes()
	{
		return $this->hasMany('Politik\Entities\GovernmentElectionVote', 'candidate_id');
	}
}
