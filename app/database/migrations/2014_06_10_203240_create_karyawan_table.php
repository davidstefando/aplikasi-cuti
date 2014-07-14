<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryawanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('karyawan', function($table){
			$table->string('nik', 20)->primary('nik');
			$table->string('nama', 50);
			$table->integer('id_bagian');
			$table->date('tgl_masuk_kerja');
			$table->string('alamat');
			$table->string('jabatan', 50);
			$table->string('username', 50);
			$table->string('password', 60);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('karyawan');
	}

}
