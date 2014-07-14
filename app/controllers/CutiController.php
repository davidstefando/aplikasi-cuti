<?php
	class CutiController extends BaseController
	{
		public function showSaldoCuti()
		{	
			$saldo = Saldo::where('nik', '=', Auth::user()->nik)
														->get();
	
			return View::make('pengajuan.saldo', compact('saldo'));
		}

		public function showHistoryCuti()
		{
			$history = Pengajuan::where('nik', '=', Auth::user()->nik)
								->where('disetujui_pimpinan', '=', '1')
								->where('disetujui_hr', '=', '1')
								->get();
			return View::make('pengajuan.history', compact('history'));
		}

		public function showFormKriteriaLaporan()
		{
			$bagian = Bagian::lists('nama', 'id');

			return View::make('kelola.laporan.form', compact('bagian'));
		}

		public function showLaporan($jenis)
		{
			if ($jenis == "perkaryawan") {
				$pemakaian = Saldo::whereHas('karyawan', function($q){
							if (Input::get('id_bagian')) {
								$q->where('id_bagian', Input::get('id_bagian'));
							} else if (Input::get('nik')) {
								$q->where('nik', Input::get('nik'));
							}
						})->with('cuti');

				$laporan = array();

				foreach ($pemakaian->get() as $key => $data) {
					if ("1" == $data->cuti->id) {
						$laporan[$data->karyawan->nama][1]["hak"] = $data->cuti->hak;
						$laporan[$data->karyawan->nama][1]["terpakai"] = $data->terpakai;
						$laporan[$data->karyawan->nama][1]["saldo"] = $data->saldo;
					} else if ("2" == $data->cuti->id) {
						$laporan[$data->karyawan->nama][2]["hak"] = $data->cuti->hak;
						$laporan[$data->karyawan->nama][2]["terpakai"] = $data->terpakai;
						$laporan[$data->karyawan->nama][2]["saldo"] = $data->saldo;
					} else {
						$laporan[$data->karyawan->nama][3]["hak"] = $data->cuti->hak;
						$laporan[$data->karyawan->nama][3]["terpakai"] = $data->terpakai;
						$laporan[$data->karyawan->nama][3]["saldo"] = $data->saldo;
					}
				}

				return View::make('kelola.laporan.karyawan', compact('laporan'));

			} else {

				$pemakaian = DB::table('saldo_cuti')
									->select(DB::raw("SUM(saldo) as saldo, SUM(terpakai) as terpakai, bagian.nama, saldo_cuti.id_cuti, hak"))
									->join('karyawan', 'saldo_cuti.nik', '=', 'karyawan.nik')
									->join('bagian', 'karyawan.id_bagian', '=', 'bagian.id')
									->join('cuti', 'saldo_cuti.id_cuti', '=' ,'cuti.id')
									->where(function($q){
										if (Input::get('id_bagian')) 
											$q->where('karyawan.id_bagian', '=', Input::get('id_bagian'));
									})
									->groupBy('karyawan.id_bagian')
									->get();

				foreach ($pemakaian as $key => $data) {
						$laporan[$data->nama]['terpakai'] = $data->terpakai;
				}

				return View::make('kelola.laporan.bagian', compact('laporan'));

			}

			

	}
}