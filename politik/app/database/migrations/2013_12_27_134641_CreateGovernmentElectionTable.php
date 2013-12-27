<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGovernmentElectionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('government_election', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();

			/* Time frames. */
			$table->dateTime('begins_at');
			$table->dateTime('ends_at');

			/* State holding the election. */
			$table->integer('state_id');			
			$table->foreign('state_id')
				->references('id')->on('state')
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
		Schema::drop('government_election');
	}

}
