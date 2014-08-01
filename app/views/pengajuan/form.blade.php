@extends('layout')
@section('content')
	@if ($errors->any())
		<ul>
			{{ implode('', $errors->all('<li class="error">:message</li>')) }}
		</ul>
	@endif
	<ul class="step">
		<li class="current"><span>1</span>Pengisian Form</li>
		<li><span>2</span>Verifikasi Data</li>
		<li><span>3</span>Tunggu Approval</li>
		<li><span>4</span>Cetak Laporan</li>
	</ul>
	<div class="row">
		<div class="content grid-10 offset-3">
			<h2><i class="fa fa-chevron-circle-right fa-fw"></i>Form Pengajuan Cuti</h2>
			{{ Form::open(array('method' => 'POST', 'url' => 'pengajuan')) }}
				<div class="form-control">
					<label>Jenis Cuti</label>
					{{ Form::select('id_cuti', $cuti, Input::old('id_cuti')) }}
				</div>
				<div class="form-control">
					<label>Tanggal Cuti</label>
					{{ Form::text('mulai') }}
				</div>
				<div class="form-control">
					<label>Tanggal Masuk</label>
					{{ Form::text('selesai') }}
				</div>
				<div class="form-control">
					<label>Tuliskan alasan anda mengambil cuti ini</label>
					{{ Form::textarea('alasan') }}
				</div>
				<div class="form-control">
					<input type="submit" value="Konfirmasi" class="btn primary right">
					<input type="reset" value="Reset" class="btn danger right">
				</div>
			{{ Form::close() }}
		</div>
	</div>

@stop