<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventtsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('eventts', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('pic');
			$table->string('video');
			$table->integer('creator');
			$table->string('elevator');
			$table->text('description');
			$table->string('type');
			$table->string('location');
			$table->string('map');
			$table->string('event_image');
			$table->datetime('time_start');
			$table->datetime('time_end');
			$table->string('time_zone');
			$table->string('recurrence_period');
			$table->integer('recurrence_count');
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
		Schema::drop('eventts');
	}

}
