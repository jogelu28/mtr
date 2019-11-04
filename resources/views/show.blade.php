@extends('layouts.app', ['page' => __('show'), 'pageSlug' => 'show'])
@section('title','personas')
@section('content')

<img style="height: 100px; width: 100px; background-color: #EFEFEF; margin: 20px;" class="card-img-top rounded-circle mx-auto d-block" src="../images/{{$persona->avatar}}" alt="" >
<h5 class="text-center">{{$persona->name}}</h5>
<div class="text-center">
	<p>
		este es un ejemplo de la programacion que se ase
	</p>
	<a href="/delete/{{$persona->id}}" class="btn btn-primary">Delete</a>
	<a href="/personas/{{$persona->id}}/edit" class="btn btn-secondary">Editar</a>
	<a href="/pdfview/{{$persona->id}}" class="btn btn-sm btn-primary">Descargar</a>
</div>
</div>
@endsection