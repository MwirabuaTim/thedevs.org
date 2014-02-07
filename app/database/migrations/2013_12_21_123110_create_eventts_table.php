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
			$table->integer('organizer');
			$table->string('elevator');
			$table->text('description');
			$table->string('type');
			$table->string('location');
			$table->string('map');
			$table->string('start_time');
			$table->string('end_time');
			$table->string('time_zone');
			$table->string('recurrence_period');
			$table->integer('recurrence_count');
			$table->string('public');
			$table->text('notes');
			$table->integer('views');
			$table->integer('votes');
			$table->string('status');
			$table->timestamps();
			$table->softDeletes();
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
