@extends('layouts.editTemplate')

@section('name-button-delete', 'Estudiante')

@section('url', '/admin/student/' . $student->id)

@section('content-edit-area')

<div class="form-group">
    {!! Form::open(['action' => ['StudentController@update',$student->id],'method' => 'put']) !!}
        {!! Form::label('name', 'Nombre Completo', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('name', $name ?? $student->name, ['class' => 'form-control']) !!}
        {!! Form::label('numberStudent', 'Número Estudiante', ['class' => 'control-label mt-2']) !!}
        {!! Form::number('numberStudent', $numberStudent ?? $student->number_student, ['class' => 'form-control']) !!}
        {!! Form::label('email', 'Email Estudiante', ['class' => 'control-label mt-2']) !!}
        {!! Form::email('email', $email ?? $student->email, ['class' => 'form-control']) !!}
        {!! Form::label('cardId', 'Id Tarjeta', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('cardId', $cardId ?? $student->card_id, ['class' => 'form-control']) !!}
        {!! Form::label('studentCareer', 'Acrónimo Carrera', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('studentCareer', $studentCareer ?? $student->acronym_career, ['class' => 'form-control']) !!}
        {!! Form::label('studentCareerTwo', 'Acrónimo Carrera 2 (Opcional)', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('studentCareerTwo', $studentCareerTwo ?? $student->acronym_career_two, ['class' => 'form-control']) !!}
        {!! Form::label('studentCareerThree', 'Acrónimo Carrera 3 (Opcional)', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('studentCareerThree', $studentCareerThree ?? $student->acronym_career_three, ['class' => 'form-control']) !!}
        {!! Form::submit('Editar', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::reset('Limpiar campos', ['class' => 'btn btn-warning mt-2']) !!}
    {!! Form::close() !!}
</div>

<a class="btn btn-info" href="/admin/generate/password?id={{$student->id}}&type={{$student->type_user_from_type_users}}">
  Generar Contraseña
</a>

@endsection