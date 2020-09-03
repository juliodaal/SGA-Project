@extends('layouts.searchingTemplate')

@section('lookingFor', 'Profesor')

@section('form')
    
    {!! Form::open(['url' => '/admin/professor/findProfessor','method' => 'post']) !!}
        {!! Form::label('name', 'Nombre Completo', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('name', $name ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('numberProfessor', 'Número Profesor', ['class' => 'control-label mt-2']) !!}
        {!! Form::number('numberProfessor', $numberProfessor ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('email', 'Email Profesor', ['class' => 'control-label mt-2']) !!}
        {!! Form::email('email', $email ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('cardId', 'Id Tarjeta', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('cardId', $cardId ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('studentCareer', 'Acrónimo Carrera', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('studentCareer', $studentCareer ?? '', ['class' => 'form-control']) !!}
        {!! Form::submit('Buscar', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::reset('Limpiar campos', ['class' => 'btn btn-warning mt-2']) !!}
    {!! Form::close() !!}

@endsection