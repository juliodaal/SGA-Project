@extends('layouts.editTemplate')

@section('name-button-delete', 'Carrera')

@section('url', '/admin/administrator/' . $administrator->id)

@section('content-edit-area')

<div class="form-group">
    {!! Form::open(['action' => ['AdministratorController@update',$administrator->id],'method' => 'put']) !!}
        {!! Form::label('name', 'Nombre Completo', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('name', $name ?? $administrator->name, ['class' => 'form-control']) !!}
        {!! Form::label('email', 'Email Administrador', ['class' => 'control-label mt-2']) !!}
        {!! Form::email('email', $email ?? $administrator->email, ['class' => 'form-control']) !!}
        {!! Form::label('cardId', 'Id Tarjeta', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('cardId', $cardId ?? $administrator->card_id, ['class' => 'form-control']) !!}
        {!! Form::submit('Editar', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::reset('Limpiar campos', ['class' => 'btn btn-warning mt-2']) !!}
    {!! Form::close() !!}
</div>

<a class="btn btn-info" href="/admin/generate/password?id={{$administrator->id}}&type={{$administrator->type_user_from_type_users}}">
  Generar Contraseña
</a>

@endsection