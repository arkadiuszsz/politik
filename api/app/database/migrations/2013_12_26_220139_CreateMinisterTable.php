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
			$table->boolean('is_prime_minister')->default(false);
			$table->boolean('can_change_tax_rates')->default(false);
			/* ... */

			/* Government the office belongs to. */
			$table->integer('government_id');
			$table->foreign('government_id')
				->references('id')->on('government')
				->onDelete('cascade');
			
			/* User holding the office. */
			$table->integer('minister_id');
			$table->foreign('minister_id')
				->references('id')->on('user')
				->onDelete('cascade');

			/* Unique key on government and minister ids. */
			$table->unique(array('government_id', 'minister_id'));
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
