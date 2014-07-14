<table>
@foreach ($karyawan as $data)
	<tr onclick="setdata({{ $data->nik }})">
		<td>{{ $data->nik }}</td>
		<td>{{ $data->nama }}</td>
	</tr>
@endforeach
</table>