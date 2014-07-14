<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCutiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cuti', function($table){
			$table->increments('id');
			$table->string('nama', 50);
			$table->text('deskripsi');
			$table->integer('hak');
			$table->string('masa_berlaku');
			$table->string('syarat');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cuti');
	}

}
