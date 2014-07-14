<?php
	class Karyawan extends Eloquent 
	{
		protected $table = "karyawan";

		protected $primaryKey = "nik";

		public $timestamps = false;

		protected $hidden = array('password');

		public function bagian()
		{
			return $this->hasOne('Bagian', 'id', 'id_bagian');
		}

		public function getDates()
		{
			return array_merge(parent::getDates(), array('tanggal_masuk_kerja'));
		}

		
	}