<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kits', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('creator');
			$table->text('about');
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
		Schema::drop('kits');
	}

}
