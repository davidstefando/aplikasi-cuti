@extends('layout')
@section('content')    
	<div class="row">
		<div class="grid-3">
			Tampilkan 
			<select>
				<option>Semua</option>
			</select>
		</div>
	</div>

	<table class="full">
		<thead>
			<th>WAKTU</th>
			<th>JENIS CUTI</th>
			<th>TANGGAL CUTI</th>
			<th>ALASAN</th>
			<th>STATUS</th>
			<th>ACTION</th>
		</thead>
		<tbody>
			@foreach ($pengajuan as $data)
			<tr>
				<td>{{ $data->tanggal }}</td>
				<td>{{ $data->cuti->nama }}</td>
				<td>{{ $data->mulai }} Sampai {{ $data->selesai }}</td>
				<td>{{ $data->alasan }}</td>
				<td>{{ $data->status }}</td>
				<td>
					@if ($data->disetujui_pimpinan  && $data->disetujui_hr)
						{{ link_to_route('cetak', 'Cetak Surat Cuti', array('id' => $data->id), array('class' => 'btn primary small')) }}
					@endif
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@stop