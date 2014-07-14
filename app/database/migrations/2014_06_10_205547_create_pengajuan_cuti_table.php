<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajuanCutiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pengajuan_cuti', function($table){
			$table->string('nik', '20')->index();
			$table->integer('id_cuti')->index();
			$table->date('tanggal');
			$table->date('mulai');
			$table->date('selesai');
			$table->text('alasan');
			$table->string('status', 20);
			$table->string('approved_by');

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
		Schema::drop('pengajuan_cuti');
	}

}
