<?php
	class Pengajuan extends Eloquent
	{
		protected $table = 'pengajuan_cuti';

		public $timestamps =false;

		public function cuti()
		{
			return $this->hasOne('Cuti', 'id', 'id_cuti');
		}

		public function karyawan()
		{
			return $this->hasOne('Karyawan', 'nik', 'nik');
		}

		public function scopeBelumDisetujuiPimpinan($query)
		{
			return $query->where('disetujui_pimpinan', '=', 0);
		}

		public function masihBolehMengambilCuti($nik, $idCuti, $hari)
		{
			$saldo = with(new Saldo)->cek($nik, $idCuti);
			if ($saldo >= $hari) {
				return true;
			}
			return false;
		}

		
	}