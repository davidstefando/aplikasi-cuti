<?php
use \Carbon\Carbon;

	class Saldo extends Eloquent
	{
		protected $table = 'saldo_cuti';

		public $timestamps = false;

		protected $guarded = array('terpakai');

		public function cuti()
		{
			return $this->hasOne('Cuti', 'id', 'id_cuti');
		}

		public function karyawan()
		{
			return $this->hasOne('Karyawan', 'nik', 'nik');
		}

		public function cek($nik, $idCuti)
		{
			return $this->where('nik', '=', $nik)
						->where('id_cuti', '=', $idCuti)
						->first()
						->saldo;
		}

		public function saldoAwal($nik)
		{
			
		}

		public function perbaruiSaldo($nik, $idCuti)
		{
			$masaBerlaku = Cuti::find($idCuti)->masa_berlaku;
			$expired = Carbon::createFromFormat(
						'Y-m-d', 
						$this->where('nik', '=', $nik)->where('id_cuti', '=', $idCuti)->first()->expired
					);
			$sekarang = Carbon::now();
			
			if ($sekarang->gte($expired)) {
				$expired->addDays($masaBerlaku);
				
			}

		}
	}