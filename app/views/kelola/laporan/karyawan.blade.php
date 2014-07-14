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
			<td rowspan="2">Nama</td>
			<td colspan="3">Cuti Besar</td>
			<td colspan="3">Cuti Tahunan</td>
			<td colspan="3">Cuti Bonus</td>
		</tr>
		<tr rowspan="2">
			<td>Hak</td>
			<td>Terpakai</td>
			<td>Saldo</td>
			<td>Hak</td>
			<td>Terpakai</td>
			<td>Saldo</td>
			<td>Hak</td>
			<td>Terpakai</td>
			<td>Saldo</td>
		</tr>
		</thead>
	@foreach ($laporan as $nama => $data)
		<tr>
			<td>{{ $nama }}</td>
			<td>{{ $data[1]["hak"] }}</td>
			<td>{{ $data[1]["terpakai"] }}</td>
			<td>{{ $data[1]["saldo"] }}</td>
			
			<td>{{ $data[2]["hak"] }}</td>
			<td>{{ $data[2]["terpakai"] }}</td>
			<td>{{ $data[2]["saldo"] }}</td>

			<td>{{ $data[3]["hak"] }}</td>
			<td>{{ $data[3]["terpakai"] }}</td>
			<td>{{ $data[3]["saldo"] }}</td>
		</tr>
	@endforeach
	</table>
@stop