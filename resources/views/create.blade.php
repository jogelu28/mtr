@extends('layouts.app', ['page' => __('create'), 'pageSlug' => 'create'])
@section('title', 'Personas Create')
@section('content')

{!!Form::open(['route'=>'personas.store','method'=>'POST','files'=>'true'])  !!}
@include('form')
{{Form::submit('Guardar',['class'=>'btn btn_primary'])}}
{!!Form::close()!!}
@endsection