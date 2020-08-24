@extends('layouts.app')

@section('title', 'Editar '.$career->acronym_career)

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
@if($errors->isNotEmpty())
        <div class="alert alert-warning alert-dismissible fade show rounded border border-warning" role="alert">
            <strong>Campos vazios</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
@endif

<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
  Apagar Curso
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apagar Curso?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Tem a certeza de querer apagar o Curso?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        {!! Form::open(['action' => ['CareerController@destroy',$career->id],'method' => 'DELETE']) !!}
        {!! Form::hidden('hidden', $hidden ?? '',['class' => 'form-control']) !!}
        {!! Form::submit('Apagar Curso', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
<div class="form-group">
    {!! Form::open(['action' => ['CareerController@update',$career->id],'method' => 'put']) !!}
        {!! Form::label('acronym', 'Acronimo', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('acronym', $acronym ?? $career->acronym_career , ['class' => 'form-control']) !!}
        {!! Form::label('name', 'Nome Curso', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('name', $name ?? $career->name, ['class' => 'form-control']) !!}
        {!! Form::submit('Editar', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::reset('Limpar Campos', ['class' => 'btn btn-warning mt-2']) !!}
    {!! Form::close() !!}
</div>

@endsection