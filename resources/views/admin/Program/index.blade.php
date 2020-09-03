@extends('layouts.searchingTemplate')

@section('lookingFor', 'Programa')

@section('form')

    {!! Form::open(['url' => '/admin/program/findProgram/','method' => 'post']) !!}
        {!! Form::label('acronym', 'Acrónimo Carrera', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('acronym', $acronym ?? '', ['class' => 'form-control']) !!}
        {!! Form::submit('Buscar', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::reset('Limpiar campo', ['class' => 'btn btn-warning mt-2']) !!}
    {!! Form::close() !!}

@endsection