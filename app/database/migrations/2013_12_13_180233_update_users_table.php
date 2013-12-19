<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateUsersTable2 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Update the users table
		Schema::table('users', function(Blueprint $table){
		// Schema::create('users', function(Blueprint $table) {
			// $table->increments('id');
			$table->string('pic');
			$table->string('video');
			$table->string('phone');
			$table->string('elevator');
			$table->text('about');
			$table->string('location');
			$table->string('map');
			$table->string('last_map');
			$table->integer('views');
			$table->integer('votes');
			$table->text('notes');
			$table->string('status');
			$table->string('public');
			// $table->timestamps();
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
				'public'
			);
		});
		// Schema::drop('users');
	}

}
