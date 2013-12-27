<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDevsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('devs', function(Blueprint $table) {
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('pic');
			$table->string('video');
			$table->string('email');
			$table->string('password');
			$table->string('phone');
			$table->string('elevator');
			$table->text('about');
			$table->string('location');
			$table->string('map');
			$table->string('last_map');
			$table->boolean('public');
			$table->text('notes');
			$table->integer('views');
			$table->integer('votes');
			$table->string('status');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('devs');
	}

}
