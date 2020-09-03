@extends('layouts.editTemplate')

@section('name-button-delete', 'Programa')

@section('url', '/admin/program/' . $program->id)

@section('content-edit-area')

<div class="form-group">
    {!! Form::open(['action' => ['ProgramController@update',$program->id],'method' => 'put']) !!}
        {!! Form::label('acronymCareer', 'Acrónimo', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('acronymCareer', $acronymCareer ?? $program->acronym_career, ['class' => 'form-control']) !!}
        {!! Form::label('acronymDiscipline', 'Acrónimo Disciplina', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('acronymDiscipline', $acronymDiscipline ?? $program->acronym_discipline, ['class' => 'form-control']) !!}
        {!! Form::label('numberProfessor', 'Número Profesor', ['class' => 'control-label mt-2']) !!}
        {!! Form::number('numberProfessor', $numberProfessor ?? $program->number_professor, ['class' => 'form-control']) !!}
        {!! Form::label('date', 'Fecha', ['class' => 'control-label mt-2']) !!}
        {!! Form::date('date', $date ?? $program->date_to_class, ['class' => 'form-control']) !!}
        {!! Form::label('startTime', 'Comienzo Aula', ['class' => 'control-label mt-2']) !!}
        {!! Form::time('startTime', $startTime ?? $program->start_class, ['class' => 'form-control']) !!}
        {!! Form::label('endClass', 'Fin Aula', ['class' => 'control-label mt-2']) !!}
        {!! Form::time('endClass', $endClass ?? $program->end_class, ['class' => 'form-control']) !!}
        {!! Form::label('classRoom', 'Número Aula', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('classRoom', $classRoom ?? $program->classroom_number, ['class' => 'form-control']) !!}
        {!! Form::label('groupStudents', 'Grupo de Estudiantes', ['class' => 'control-label mt-2']) !!}
        {!! Form::number('groupStudents', $groupStudents ?? $program->group_from_students, ['class' => 'form-control']) !!}
        {!! Form::submit('Editar', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::reset('Limpiar campos', ['class' => 'btn btn-warning mt-2']) !!}
    {!! Form::close() !!}
</div>

@endsection