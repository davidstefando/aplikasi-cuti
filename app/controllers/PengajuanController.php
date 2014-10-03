<?php
use \Carbon\Carbon;

	class PengajuanController extends BaseController
	{
		public function showPengajuanForm()
		{
			$cuti = Cuti::lists('nama', 'id');
			return View::make('pengajuan.form', compact('cuti'));
		}

		public function showVerifikasi()
		{
			if ($this->masihBolehMengambilCuti()) {

					if (!$this->valid()){
						return Redirect::to('pengajuan')
								->withInput()
								->withErrors('Tanggal Tidak Valid');
					}

					Session::put('nik', Auth::user()->nik);
					Session::put('id_cuti', Input::get('id_cuti'));
					Session::put('tanggal', date('Y-m-d'));
					Session::put('mulai', Input::get('mulai'));
					Session::put('selesai', Input::get('selesai'));
					Session::put('alasan', Input::get('alasan'));


					//ambil detail data pengajuan dari database
					$karyawan = Karyawan::find(Session::get('nik'));
					$namaCuti = Cuti::find(Input::get('id_cuti'))->nama;
					
					return View::make('pengajuan.verifikasi')
										->with(compact('karyawan'))
										->with(compact('namaCuti'));
			}
			return Redirect::to('pengajuan')
								->withInput()
								->withErrors('Saldo Cuti Tidak Cukup');
		}

		private function valid()
		{
			$start = \Carbon\Carbon::createFromFormat('Y-m-d', Input::get('mulai'));
			$end = \Carbon\Carbon::createFromFormat('Y-m-d', Input::get('selesai'));
			if ($start->lt($end) && 
				$start->gt(\Carbon\Carbon::now()) &&
				$end->gt(\Carbon\Carbon::now())) {
					return true;		
				}
		}

		private function masihBolehMengambilCuti() 
		{
			$mulai = Carbon::createFromFormat('Y-m-d', Input::get('mulai'));
			$selesai = Carbon::createFromFormat('Y-m-d', Input::get('selesai'));


			return with(new Pengajuan)->masihBolehMengambilCuti(
					Auth::user()->nik,
					Input::get('id_cuti'),
					$mulai->diffInDays($selesai));

		}

		public function ajukanCuti()
		{
 			$pengajuan = new Pengajuan;
 			$pengajuan->nik = Session::get('nik');
 			$pengajuan->id_cuti = Session::get('id_cuti');
 			$pengajuan->tanggal = Session::get('tanggal');
 			$pengajuan->mulai = Session::get('mulai');
 			$pengajuan->selesai = Session::get('selesai');
 			$pengajuan->alasan = Session::get('alasan');
 			$pengajuan->status = "<label class='danger'>Belum Disetujui</label>";
 			$pengajuan->save();

 			$this->updateSaldo();

 			return View::make('pengajuan.approval');
		}

		public function updateSaldo()
		{
			$mulai = Carbon::createFromFormat('Y-m-d', Session::get('mulai'));
			$selesai = Carbon::createFromFormat('Y-m-d', Session::get('selesai'));

			$terpakai = $mulai->diffInDays($selesai);
			DB::table('saldo_cuti')
				->where('nik', Session::get('nik'))
				->where('id_cuti', Session::get('id_cuti'))
				->decrement('saldo', $terpakai);
				
			DB::table('saldo_cuti')
				->where('nik', Session::get('nik'))
				->where('id_cuti', Session::get('id_cuti'))
				->increment('terpakai', $terpakai);
		}

		public function getStatusPengajuan()
		{
			$pengajuan = Pengajuan::where('nik', '=', Auth::user()->nik)->get();
			return View::make('pengajuan.status', compact('pengajuan'));
		}

		public function showSuratCuti($id)
		{
			$dataCuti = Pengajuan::where('id', $id)
								->with('Karyawan')
								->first();

			return View::make('pengajuan.suratcuti')->with(compact('dataCuti'));
		}

		public function batalkanPengajuan()
		{

		}
	}	