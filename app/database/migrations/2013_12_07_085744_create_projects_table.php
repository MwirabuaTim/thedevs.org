<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('logo');
			$table->string('video');
			$table->integer('creator');
			$table->string('elevator');
			$table->string('link');
			$table->text('description');
			$table->string('type');
			$table->text('contacts');
			$table->integer('forum_id');
			$table->string('location');
			$table->string('map');
			$table->integer('views');
			$table->integer('votes');
			$table->text('notes');
			$table->string('status');
			$table->string('public');
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
		Schema::drop('projects');
	}

}
