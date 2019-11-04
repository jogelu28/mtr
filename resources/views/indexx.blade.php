
@extends('layouts.app', ['page' => __('indexx'), 'pageSlug' => 'indexx'])
@section('title', 'trainers')
@section('content')
<a href="{{route('listado.pdf')}}" class="btn btn-sm btn-primary">Descargar todos los datos en pdf</a>
<div class="row">
@csrf

@foreach ($trainers as $trainer)
<div class="col-sm">
	<div class="card text-center" style="width: 18rem; margin-top: 70px;">
		<img style="height: 100px; width: 100px;
		background-color: #EFEFEF; margin: 20px;
		"class="card-img-top rounded-circle mx-auto d-block"
		src="images/{{$trainer->avatar}}" alt="">
<div class="card-body">
	<h5 class="card-title">{{$trainer->name}}</h5>
	<p class="card-text"> some quick example text to build on the card title and make up the bulk of the card's content.</p>
	<a href="/delete/{{$trainer->id}}" class="btn btn-dark">Delete...</a>
	<a href="/trainers/{{$trainer->id}}" class="btn btn-dark">Ver mas..</a>

</div>
	</div>
</div>
@endforeach
</div>
@endsection