@extends('layout')
@section('content')
	<table class="full">
		<thead>
			<th>WAKTU</th>
			<th>JENIS CUTI</th>
			<th>NAMA</th>
			<th>TANGGAL CUTI</th>
			<th>ALASAN</th>
			<!-- <th>KARYAWAN SEDANG CUTI</th> -->
			<th>ACTION</th>
		</thead>
		<tbody>
			@foreach ($pengajuan as $data)
				<tr>
					<td>{{ $data->tanggal }}</td>
					<td>Cuti {{ $data->cuti->nama }}</td>
					<td>{{ $data->karyawan->nama }}</td>
					<td>{{ $data->mulai }} Sampai {{ $data->selesai }}</td>
					<td>{{ nl2br($data->alasan) }}</td>
					<!-- <td>10%</td> -->
					<td>
						{{ link_to_route('setuju', 'Setuju', $data->id, array('class' => 'btn primary small')) }}
						{{ link_to_route('tolak', 'Tolak', $data->id, array('class' => 'btn danger small')) }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop