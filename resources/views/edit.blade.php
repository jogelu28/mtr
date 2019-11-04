@extends('layouts.app', ['page' => __('edit'), 'pageSlug' => 'edit'])
@section('title','Personas Edit')
@section('content')
{!!Form::model($persona,['route'=>['personas.update',$persona],'method'=>'PUT','files'=>true])!!}
@include('form')
{{Form::submit('Guardar',['class'=>'btn btn_primary'])}}
{!!Form::close()!!}
@endsection