@extends('layout')
@section('content')      
	<table class="full">
		<thead>
			<th>WAKTU</th>
			<th>JENIS CUTI</th>
			<th>TANGGAL CUTI</th>
			<th>ALASAN</th>
		</thead>
		<tbody>
			@foreach ($history as $data)
			<tr>
				<td>{{ $data->tanggal }}</td>
				<td>{{ $data->cuti->nama }}</td>
				<td>{{ $data->mulai }} Sampai {{ $data->selesai}}</td>
				<td>{{ nl2br($data->alasan) }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@stop