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
			$table->increments('id');
			$table->timestamps();
			
			/* Cooridnates on the map. */
			$table->integer('x')->unsigned();
			$table->integer('y')->unsigned();

			/* Index on the coordinates. */
			$table->index(array('x', 'y'));

			/* Sovereign state. */
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
		Schema::drop('sector');
	}

}
