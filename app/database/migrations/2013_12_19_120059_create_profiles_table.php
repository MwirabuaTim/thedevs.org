<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function(Blueprint $table) {
			$table->increments('id');
			$table->string('provider');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email');
			$table->string('pic');
			$table->string('location');
			$table->string('description');
			$table->string('username');
			$table->string('uid');
			$table->string('link');
			$table->string('code');
			$table->string('field1');
			$table->string('field2');
			$table->string('field3');
			$table->string('field4');
			$table->string('field5');
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
		Schema::drop('profiles');
	}

}
