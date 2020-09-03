@extends('layouts.searchingTemplate')

@section('lookingFor', 'Plan de Educación')

@section('form')

    {!! Form::open(['action' => 'EducationalPlanController@findPlan','method' => 'post']) !!}
        {!! Form::label('acronymCareer', 'Acrónimo Carrera', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('acronymCareer', $acronymCareer ?? '', ['class' => 'form-control']) !!}
        {!! Form::submit('Buscar', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::reset('Limpiar campos', ['class' => 'btn btn-warning mt-2']) !!}
    {!! Form::close() !!}

@endsection