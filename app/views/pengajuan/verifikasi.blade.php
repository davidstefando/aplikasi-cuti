@extends('layout')
@section('content')
	<ul class="step">
		<li><span>1</span>Pengisian Form</li>
		<li class="current"><span>2</span>Verifikasi Data</li>
		<li><span>3</span>Tunggu Approval</li>
		<li><span>4</span>Cetak Laporan</li>
	</ul>
	<div class="row">
		<div class="grid-9 offset-4">
			<h2><i class="fa fa-check"></i>Verifikasi Data</h2>
			<p>Anda baru saja mengajukan cuti dengan data sebagai berikut</p>
			
			<strong>DATA KARYAWAN</strong>
			<table>
				<tr>
					<td>NIK</td>
					<td>:</td>
					<td>{{ $karyawan->nik }}</td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td>{{ $karyawan->nama }}</td>
				</tr>
				<tr>
					<td>Bagian</td>
					<td>:</td>
					<td>{{ $karyawan->bagian->nama }}</td>
				</tr>
				<tr>
					<td>Tgl Masuk</td>
					<td>:</td>
					<td>{{ $karyawan->tanggal_masuk_kerja }}</td>
				</tr>
			</table>

			<strong>DATA CUTI</strong>
			<table>
				<tr>
					<td>Jenis Cuti</td>
					<td>:</td>
					<td>{{ $namaCuti }}</td>
				</tr>
				<tr>
					<td>Tanggal</td>
					<td>:</td>
					<td>{{ Session::get('mulai') . ' sampai ' . Session::get('selesai') }}</td>
				</tr>
				<tr>
					<td>Alasan</td>
					<td>:</td>
					<td>{{ nl2br(Session::get('alasan')) }}</td>
				</tr>
			</table>

			<p>Harap pastikan data tersebut benar dan dapat dipertanggung jawabkan, setelah proses konfirmasi data tidak dapat diperbaiki lagi</p>

			{{ link_to('pengajuan/ajukan', 'Verifikasi', array('class' => 'btn primary right')) }}
			<a href="/pengajuan" class="btn danger right">Batalkan</a>
		</div>
	</div>
@stop