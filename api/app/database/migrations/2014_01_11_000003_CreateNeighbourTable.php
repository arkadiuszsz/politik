<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeighbourTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('neighbour', function(Blueprint $table)
		{
			$table->string('sector_id');
			$table->string('neighbour_id');
			$table->foreign('sector_id')
				->references('id')->on('sector')
				->onDelete('cascade');
			$table->foreign('neighbour_id')
				->references('id')->on('sector')
				->onDelete('cascade');
			$table->primary(array('sector_id', 'neighbour_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('neighbour');
	}

}
