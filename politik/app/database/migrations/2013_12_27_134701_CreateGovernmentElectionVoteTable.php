<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGovernmentElectionVoteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('government_election_vote', function(Blueprint $table)
		{
			$table->timestamps();

			/* Election the vote belongs to. */
			$table->integer('election_id');			
			$table->foreign('election_id')
				->references('id')->on('government_election')
				->onDelete('cascade');
			
			/* Candidate the elector voted for. */
			$table->integer('candidate_id');			
			$table->foreign('candidate_id')
				->references('id')->on('user')
				->onDelete('cascade');

			/* Foreign key on the list of candidates. */
			$table->foreign(array('election_id', 'candidate_id'))
				->references(array('election_id', 'candidate_id'))
				->on('government_election_candidate');
	
			/* Elector. */
			$table->integer('elector_id');			
			$table->foreign('elector_id')
				->references('id')->on('user')
				->onDelete('cascade');

			/* Primary key on election and elector ids. */
			$table->primary(array('election_id', 'elector_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('government_election_vote');
	}

}
