<!DOCTYPE html>
<html>
<head>
	<title>Resep Obat Digital</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Data Resep Obat Digital</h4>
	
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Type</th>
				<th>Obat</th>
				<th>Signa</th>
				<th>Qty</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($data as $value)
			<tr>
				<td>{{ $i++ }}</td>
				<td> @if($value->type == 0)
                    Non Racikan
                     @else
                    Racikan
                    @endif</td>
				<td>{{$value->obat->obatalkes_nama}}</td>
				<td>{{$value->signa->signa_nama}}</td>
				<td>{{$value->qty}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>