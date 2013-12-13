<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stories', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('creator');
			$table->text('body');
			$table->string('location');
			$table->string('map');
			$table->integer('views');
			$table->integer('votes');
			$table->text('notes');
			$table->string('status');
			$table->string
('public');
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
		Schema::drop('stories');
	}

}
