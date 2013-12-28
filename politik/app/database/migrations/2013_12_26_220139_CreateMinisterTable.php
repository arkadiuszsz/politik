<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinisterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('minister', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			
			/* Responsibilities. */
			$table->boolean('isPrimeMinister')->default(false);
			$table->boolean('canChangeTaxRates')->default(false);
			/* ... */
			
			/* User holding the office. */
			$table->integer('user_id');
			$table->foreign('user_id')
				->references('id')->on('user')
				->onDelete('cascade');

			/* Government the office belongs to. */
			$table->integer('government_id');
			$table->foreign('government_id')
				->references('id')->on('government')
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
		Schema::drop('minister');
	}

}
