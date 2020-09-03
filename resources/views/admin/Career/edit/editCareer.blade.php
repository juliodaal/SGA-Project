@extends('layouts.editTemplate')

@section('name-button-delete', 'Carrera')

@section('url', '/admin/career/' . $career->id)

@section('content-edit-area')

<div class="form-group">
    {!! Form::open(['action' => ['CareerController@update',$career->id],'method' => 'put']) !!}
        {!! Form::label('acronym', 'Acrónimo', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('acronym', $acronym ?? $career->acronym_career , ['class' => 'form-control']) !!}
        {!! Form::label('name', 'Nombre Carrera', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('name', $name ?? $career->name, ['class' => 'form-control']) !!}
        {!! Form::submit('Editar', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::reset('Limpiar Campos', ['class' => 'btn btn-warning mt-2']) !!}
    {!! Form::close() !!}
</div>

@endsection