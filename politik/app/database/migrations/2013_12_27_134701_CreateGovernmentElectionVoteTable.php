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
			$table->increments('id');
			$table->timestamps();

			/* Candidate the elector voted for. */
			$table->integer('candidate_id');			
			$table->foreign('candidate_id')
				->references('id')->on('government_election_candidate')
				->onDelete('cascade');
		
			/* Elector. */
			$table->integer('user_id');			
			$table->foreign('user_id')
				->references('id')->on('user')
				->onDelete('cascade');
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
