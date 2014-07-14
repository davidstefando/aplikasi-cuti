<html>
<head>
	<title>Surat Cuti</title>
	<style type="text/css">
		.surat {
			width:50%;
			margin:auto;
			padding: 10px;
			border:1px dotted #888888;
		}

		.surat h1{
			margin-top:10px;
			padding: 0;
		}

		.surat p{
			margin-top:5px;
		}

		.center{
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="surat">
		<h1 class="center">SURAT CUTI</h1>
		<p class="center"><small>PT. Tanjung Kreasi Parquet Temanggung</small></p>
		<p>Dengan ini kami menyatakan bahwa karyawan dengan data sebagai berikut</p>
		<table>
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td>{{ $dataCuti->karyawan->nik }}</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td></td>
				<td>{{ $dataCuti->karyawan->nama }}</td>
			</tr>
			<tr>
				<td>Bagian</td>
				<td>:</td>
				<td>{{ $dataCuti->karyawan->bagian->nama }}</td>
			</tr>
		</table>
		<p>Berhak menerima Cuti {{ $dataCuti->cuti->nama }} mulai {{ $dataCuti->mulai }} hingga {{ $dataCuti->selesai }}</p>
		<p>Harap gunakan waktu cuti ini sebaik-baiknya</p>
	</div>
</body>
</html>