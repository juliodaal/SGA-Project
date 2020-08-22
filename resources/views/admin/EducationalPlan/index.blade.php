@extends('layouts.app')

@section('title', 'Pesquisar Plano Educação')

@section('content')
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
        Pesquisa um <strong>Plano de educação</strong> através um dos seguintes inputs
    </small>
    {!! Form::open(['action' => 'EducationalPlanController@findPlan','method' => 'post']) !!}
        {!! Form::label('acronymCareer', 'Acronimo Curso', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('acronymCareer', $acronymCareer ?? '', ['class' => 'form-control']) !!}
        {!! Form::submit('Pesquisar', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::reset('Limpar campos', ['class' => 'btn btn-warning mt-2']) !!}
    {!! Form::close() !!}
</div>
@endsection