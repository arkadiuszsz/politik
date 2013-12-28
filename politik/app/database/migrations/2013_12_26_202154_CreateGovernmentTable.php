<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGovernmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('government', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

			/* Time frames. */
			$table->dateTime('begins_at');
			$table->dateTime('ends_at');

			/* State the government rules. */
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
		Schema::drop('government');
	}

}
