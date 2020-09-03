@extends('layouts.editTemplate')

@section('name-button-delete', 'Profesor')

@section('url', '/admin/professor/' . $professor->id)

@section('content-edit-area')

<div class="form-group">
    {!! Form::open(['action' => ['ProfessorController@update',$professor->id],'method' => 'put']) !!}
        {!! Form::label('name', 'Nombre Completo', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('name', $name ?? $professor->name, ['class' => 'form-control']) !!}
        {!! Form::label('numberProfessor', 'Número Profesor', ['class' => 'control-label mt-2']) !!}
        {!! Form::number('numberProfessor', $numberProfessor ?? $professor->number_professor, ['class' => 'form-control']) !!}
        {!! Form::label('email', 'Email Profesor', ['class' => 'control-label mt-2']) !!}
        {!! Form::email('email', $email ?? $professor->email, ['class' => 'form-control']) !!}
        {!! Form::label('cardId', 'Id Tarjeta', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('cardId', $cardId ?? $professor->card_id, ['class' => 'form-control']) !!}
        {!! Form::label('studentCareer', 'Acrónimo Carrera', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('studentCareer', $studentCareer ?? $professor->acronym_career, ['class' => 'form-control']) !!}
        {!! Form::label('studentCareerTwo', 'Acrónimo Carrera 2 (Opcional)', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('studentCareerTwo', $studentCareerTwo ?? $professor->acronym_career_two, ['class' => 'form-control']) !!}
        {!! Form::label('studentCareerThree', 'Acrónimo Carrera 3 (Opcional)', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('studentCareerThree', $studentCareerThree ?? $professor->acronym_career_three, ['class' => 'form-control']) !!}
        {!! Form::label('professorDiscipline', 'Acrónimo Disciplina', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('professorDiscipline', $professorDiscipline ?? $professor->professor_discipline, ['class' => 'form-control']) !!}
        {!! Form::label('professorDisciplineTwo', 'Acrónimo Disciplina 2 (Opcional)', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('professorDisciplineTwo', $professorDisciplineTwo ?? $professor->professor_discipline_two, ['class' => 'form-control']) !!}
        {!! Form::label('professorDisciplineThree', 'Acrónimo Disciplina 3 (Opcional)', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('professorDisciplineThree', $professorDisciplineThree ?? $professor->professor_discipline_three, ['class' => 'form-control']) !!}
        {!! Form::submit('Editar', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::reset('Limpiar campos', ['class' => 'btn btn-warning mt-2']) !!}
    {!! Form::close() !!}
</div>

<a class="btn btn-info" href="/admin/generate/password?id={{$professor->id}}&type={{$professor->type_user_from_type_users}}">
  Generar Contraseña
</a>

@endsection