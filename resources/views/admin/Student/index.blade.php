@extends('layouts.searchingTemplate')

@section('lookingFor', 'Estudiantes')

@section('form')

    {!! Form::open(['url' => '/admin/student/findStudent/','method' => 'post']) !!}
        {!! Form::label('name', 'Nombre Completo', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('name', $name ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('numberStudent', 'Número Estudiante', ['class' => 'control-label mt-2']) !!}
        {!! Form::number('numberStudent', $numberStudent ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('email', 'Email Estudiante', ['class' => 'control-label mt-2']) !!}
        {!! Form::email('email', $email ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('cardId', 'Id Tarjeta', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('cardId', $cardId ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('StudentCareer', 'Acrónimo Carrera', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('StudentCareer', $StudentCareer ?? '', ['class' => 'form-control']) !!}
        {!! Form::submit('Buscar', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::reset('Limpiar campos', ['class' => 'btn btn-warning mt-2']) !!}
    {!! Form::close() !!}

@endsection