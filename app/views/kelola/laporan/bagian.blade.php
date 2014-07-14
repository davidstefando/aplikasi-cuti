@extends('layout')
@section('content')
	<h2>Rekap Data Cuti</h2>
	<div class="row">
		<div class="grid-3 offset-1">Bulan : {{ date('F') }}</div>
		<div class="grid-3 offset-1">Tahun : {{ date('Y') }}</div>
	</div>
	<table width="100%" cellpadding="10px" border="1px">
		<thead>
		<tr>
			<td>Nama</td>
			<td>Hak</td>
			<td>Terpakai</td>
			<td>Saldo</td>
		</tr>
		</thead>
	@foreach ($laporan as $nama => $data)
		<tr>
			<td>{{ $nama }}</td>
			<td>{{ $data["hak"] }}</td>
			<td>{{ $data["terpakai"] }}</td>
			<td>{{ $data["saldo"] }}</td>
		</tr>
	@endforeach
	</table>
@stop