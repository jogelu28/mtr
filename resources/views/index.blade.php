
@extends('layouts.app', ['page' => __('index'), 'pageSlug' => 'index'])
@section('title', 'personas')
@section('content')
<a href="{{route('listado.pdf')}}" class="btn btn-sm btn-primary">Descargar todos los datos en pdf</a>
<div class="row">
@csrf

@foreach ($personas as $persona)
<div class="col-sm">
	<div class="card text-center" style="width: 18rem; margin-top: 70px;">
		<img style="height: 100px; width: 100px;
		background-color: #EFEFEF; margin: 20px;
		"class="card-img-top rounded-circle mx-auto d-block"
		src="images/{{$persona->avatar}}" alt="">
<div class="card-body">
	<h5 class="card-title">{{$persona->name}}</h5>
	<p class="card-text"> some quick example text to build on the card title and make up the bulk of the card's content.</p>
	<a href="/delete/{{$persona->id}}" class="btn btn-dark">Delete...</a>
	<a href="/personas/{{$persona->id}}" class="btn btn-dark">Ver mas..</a>

</div>
	</div>
</div>
@endforeach
</div>
@endsection