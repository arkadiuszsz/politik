<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();

			/* Basic info. */
			$table->string('nickname');
			$table->string('email')->unique();
			$table->string('password');

			/* Markdown-formatted user. */
			$table->longText('about')->nullable();

			/* Current position */
			$table->integer('sector_id')->nullable();
			$table->foreign('sector_id')
				->references('id')->on('sector')
				->onDelete('restrict');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user');
	}

}
