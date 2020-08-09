@extends('layouts.template')

@section('title', 'Editar Disciplina')

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
  Apagar Disciplina
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apagar Disciplina?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Tem a certeza de querer apagar a disciplina?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        {!! Form::open(['url' => 'admin/discipline/{discipline} ','method' => 'DELETE']) !!}
        {!! Form::hidden('hidden', $hidden ?? '',['class' => 'form-control']) !!}
        {!! Form::submit('Apagar Disciplina', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
<div class="form-group">
    {!! Form::open(['url' => 'admin/discipline/','method' => 'put']) !!}
        {!! Form::label('acronym', 'Acronimo', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('acronym', $acronym ?? '{{ $acronym }}', ['class' => 'form-control']) !!}
        {!! Form::label('name', 'Nome Disciplina', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('name', $name ?? '{{ $name }}', ['class' => 'form-control']) !!}
        {!! Form::submit('Editar', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::reset('Borrar Datos', ['class' => 'btn btn-warning mt-2']) !!}
    {!! Form::close() !!}
</div>

@endsection