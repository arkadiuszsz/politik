<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sector', function(Blueprint $table)
		{
			$table->string('id')->primary();
			$table->string('name');
			$table->timestamps();

			/* Sovereign state. */
			$table->integer('state_id')->nullable();
			$table->foreign('state_id')
				->references('id')->on('state')
				->onDelete('set null');

			/* TODO: sector natural resources like water, coal, gold etc. */	
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sector');
	}

}
