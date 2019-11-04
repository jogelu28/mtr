@extends('layouts.pdfinicio')
@section('content')
<p align="center"><h1 align="center">Resutados</h1></p>
<style type="text/css">
table {border-collapse:collapse}
td {border:1px solid black}
</style>
<table class="table table-hover table-striped" bgcolor="#55B5F5" border="5" width="500">

	<thead align="center">
		<tr>
			<th bgcolor="#78F318">Id</th>
			<th bgcolor="#78F318">Nombre</th>
			<th bgcolor="#78F318">Apellido</th>
			<th bgcolor="#78F318">Imagen de perfil</th>
		</tr>
	</thead>
	<tbody align="center">

		<tr>
			<td>{{$persona->id}}</td>
			<td>{{$persona->name}}</td>
			<td>{{$persona->apellido}}</td>
			<td align="center" width="10"><div class="card text-center" style="width: 18rem; margin-top: 70px;">
		<img style="height: 100px; width: 100px;
		background-color: #EFEFEF; margin: 20px;
		"class="card-img-top rounded-circle mx-auto d-block"
		src="images/{{$persona->avatar}}" alt=""></div></td>
		</tr>

	</tbody>	
</table>
@endsection