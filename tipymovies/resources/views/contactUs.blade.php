<!DOCTYPE html>
@extends('layout')

@section('content')

<link href="{{asset('css/sobrenos.css')}}" rel="stylesheet" type="text/css" media="all">
<title>About Us</title>

<div class="container">
    <h2>Acerca de TIPYMOVIES:</h2>
    <p>Somos un grupo de cuatro estudiantes del Taller de PHP del Tecnólogo en Informática de Paysandú.<br></p>
    <p>Esta web nace como proyecto clave para la aprobacion del mismo.</p>
</div>
<div>

    <div class="container">
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
        {!! Form::open(['route'=>'contactus.store']) !!}
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            {!! Form::label('Nombre:') !!}
            {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Su Nombre']) !!}
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>

        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            {!! Form::label('Email:') !!}
            {!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Su Email']) !!}
            <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>

        <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
            {!! Form::label('Mensaje:') !!}
            {!! Form::textarea('message', old('message'), ['class'=>'form-control', 'placeholder'=>'Su Mensaje']) !!}
            <span class="text-danger">{{ $errors->first('message') }}</span>
        </div>

        <div class="form-group">
            <button class="btn btn-success" type="submit">Enviar</button>
        </div>
            {!! Form::close() !!}
    </div>
</div>


<!-- JAVASCRIPTS -->


@endsection('content')