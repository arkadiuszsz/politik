<?php

namespace Politik\Entities;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

/**
 * Class: User
 *
 * @see UserInterface
 * @see RemindableInterface
 * @see Eloquent
 */
class User extends \Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Indicates that the model should be soft-deleted by default.
	 *
	 * @var mixed
	 */
	protected $softDelete = true;

	/**
	 * Appends additional fields in JSON.
	 *
	 * @var array
	 */
	protected $appends = array('avatar');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	 * One-to-many relationship with Passport
	 */
	public function passports()
	{
		return $this->hasMany('Politik\Entities\Passport', 'owner_id');
	}

	/**
	 * One-to-many relationship with GovernmentElectionVote.
	 *
	 */
	public function governmentElectionVotes()
	{
		return $this->hasMany('Politik\Entities\GovernmentElectionVote', 'elector_id');
	}

	/**
	 * One-to-many relationship with GovernmentElectionCandidate.
	 */
	public function governmentElectionCandidacies()
	{
		return $this->hasMany('Politik\Entities\GovernmentElectionCandidate', 'candidate_id');
	}

	/**
	 * One-to-many relationship with Minister.
	 */
	public function offices()
	{
		return $this->hasMany('Politik\Entities\Minister', 'minister_id');
	}

	/**
	 * Many-to-one relationship with Sector.
	 */
	public function position()
	{
		return $this->belongsTo('Politik\Entities\Sector', 'position_id');
	}

	/**
	 * Generate URL to gravatar.
	 */
	public function getAvatarAttribute()
	{
		$hash = md5(strtolower(trim($this->email)));
		$url = "http://www.gravatar.com/avatar/$hash?d=retro";
		return $url;
	}
}
