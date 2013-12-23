<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMydatatypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mydatatypes', function(Blueprint $table) {
			$table->increments('id');
			$table->boolean('mycheckbox');
			$table->integer('myints');
			$table->datetime('mydates');
			$table->text('mystring');
			$table->float('myfloat');
			$table->biginteger('mybigint');
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
		Schema::drop('mydatatypes');
	}

}
