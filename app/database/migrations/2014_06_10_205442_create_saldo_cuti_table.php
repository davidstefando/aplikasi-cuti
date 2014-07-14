<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaldoCutiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('saldo_cuti', function($table){
			$table->string('nik', '20')->index();
			$table->integer('id_cuti')->index();
			$table->integer('terpakai');
			$table->integer('saldo');
			$table->date('expired');

			$table->foreign('nik')
					->references('nik')->on('karyawan');

			$table->foreign('id_cuti')
					->references('id')->on('cuti');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('saldo_cuti');
	}

}
