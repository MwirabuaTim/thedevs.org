<?php

use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Update the users table
		Schema::table('users', function($table){
			$table->string('pic');
			$table->string('video');
			$table->string('phone');
			$table->string('elevator');
			$table->text('about');
			$table->string('location');
			$table->string('map');
			$table->string('last_map');
			$table->text('contacts');
			$table->text('notes');
			$table->string('public');
			$table->integer('views');
			$table->integer('votes');
			$table->string('status');
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
		// Update the users table
		Schema::table('users', function($table)
		{
			$table->dropColumn(
				'pic',
				'video',
				'phone',
				'elevator',
				'about',
				'location',
				'map',
				'last_map',
				'views',
				'votes',
				'notes',
				'status',
				'public',
				'deleted_at'
			);
		});
	}

}
