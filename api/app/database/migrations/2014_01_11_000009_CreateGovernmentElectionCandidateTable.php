<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGovernmentElectionCandidateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('government_election_candidate', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

			/* Markdown-formatted manifesto. */
			$table->longText('manifesto')->nullable();

			/* Election the user candidates in. */
			$table->integer('election_id')->unsigned();			
			$table->foreign('election_id')
				->references('id')->on('government_election')
				->onDelete('cascade');
			
			/* Candidating user. */
			$table->integer('candidate_id')->unsigned();			
			$table->foreign('candidate_id')
				->references('id')->on('user')
				->onDelete('cascade');

			/* Unique key on election and candidate ids. */
			$table->unique(array('election_id', 'candidate_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('government_election_candidate');
	}

}
