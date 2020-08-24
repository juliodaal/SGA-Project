@extends('layouts.app')

@section('title', 'Pesquisar Estudante')

@section('content')
@if(session()->has('error'))
    <div class="alert alert-warning alert-dismissible fade show rounded border border-warning" role="alert">
        <strong>{{ session()->get('error') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    {!! session()->forget('error') !!}
@endif
@if(session()->has('successfully'))
    <div class="alert alert-success alert-dismissible fade show rounded border border-success" role="alert">
        <strong>{{ session()->get('successfully') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    {!! session()->forget('successfully') !!}
@endif
@isset($successfully)
    <div class="alert alert-success alert-dismissible fade show rounded border border-success" role="alert">
        <strong>{{ $successfully }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endisset
@if($errors->isNotEmpty())
        <div class="alert alert-warning alert-dismissible fade show rounded border border-warning" role="alert">
            <strong>Campo vazio</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
@endif
@isset($error)
    <div class="alert alert-warning alert-dismissible fade show rounded border border-warning" role="alert">
        <strong>{{ $error }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endisset
<div class="form-group">
    <small id="emailHelp" class="form-text text-muted">
        Pesquisa um <strong>Estudante</strong> através um dos seguintes inputs
    </small>
    {!! Form::open(['url' => '/admin/student/findStudent/','method' => 'post']) !!}
        {!! Form::label('name', 'Nome Completo', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('name', $name ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('numberStudent', 'Numero Estudante', ['class' => 'control-label mt-2']) !!}
        {!! Form::number('numberStudent', $numberStudent ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('email', 'Email Estudante', ['class' => 'control-label mt-2']) !!}
        {!! Form::email('email', $email ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('cardId', 'Id Cartão', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('cardId', $cardId ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('StudentCareer', 'Acronimo Turma', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('StudentCareer', $StudentCareer ?? '', ['class' => 'form-control']) !!}
        {!! Form::submit('Pesquisar', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::reset('Limpar campos', ['class' => 'btn btn-warning mt-2']) !!}
    {!! Form::close() !!}
</div>
@endsection