@extends('layouts.editTemplate')

@section('name-button-delete', 'Disciplina')

@section('url', '/admin/discipline/' . $discipline->id)

@section('content-edit-area')

<div class="form-group">
    {!! Form::open(['action' => ['DisciplineController@update',$discipline->id],'method' => 'put']) !!}
        {!! Form::label('acronym', 'Acrónimo', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('acronym', $acronym ?? $discipline->acronym_discipline , ['class' => 'form-control']) !!}
        {!! Form::label('name', 'Nombre Disciplina', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('name', $name ?? $discipline->name, ['class' => 'form-control']) !!}
        {!! Form::submit('Editar', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::reset('Limpiar Campos', ['class' => 'btn btn-warning mt-2']) !!}
    {!! Form::close() !!}
</div>

@endsection