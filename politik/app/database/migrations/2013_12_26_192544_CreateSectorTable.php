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
			$table->timestamps();

			/* Forbids altering the sector during the game. */
			$table->boolean('isLocked')->default(false);
			/* Flag for the non-land sectors like salt water, or... lava */
			$table->boolean('isNotLand')->default(false);

			/* Cooridnates on the map. */
			$table->integer('x')->unsigned();
			$table->integer('y')->unsigned();
			/* Make it a composite primary key */
			$table->primary(array('x', 'y'));

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
