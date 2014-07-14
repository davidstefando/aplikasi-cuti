@extends('layout')
@section('content')    
	<div class="row">
		@foreach ($saldo as $data)
		<div class="grid-4 offset-2">
			<h2>Saldo Cuti {{ $data->cuti->nama}}</h2>
			<canvas id="{{ $data->cuti->nama }}"></canvas>
			<table class="full">
				<tr>
					<td>Total</td>
					<td>Diambil</td>
					<td>Sisa</td>
				</tr>
				<tr>
					<td>{{ $data->terpakai + $data->saldo }}</td>
					<td>{{ $data->terpakai }}</td>
					<td>{{ $data->saldo }}</td>
				</tr>
			</table>
		</div>
		@endforeach
	</div>
@stop

@section('script')
	@foreach ($saldo as $data)
		var {{ $data->cuti->nama }} = [
			{value: {{ $data->terpakai }}, color:"#F38630"},
			{value : {{ $data->saldo }}, color : "#E0E4CC"}
		];
		new Chart(document.getElementById("{{ $data->cuti->nama }}").getContext("2d")).Pie({{ $data->cuti->nama }});
	@endforeach
@stop