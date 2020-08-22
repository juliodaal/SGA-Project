@extends('layouts.app')

@section('title', 'Editar '.$plan->acronym_career_from_careers)

@section('content')

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
  Apagar Plano de Educação
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apagar Plano Educação?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Tem a certeza de querer apagar o Plano de Educação?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        {!! Form::open(['action' => ['EducationalPlanController@destroy',$plan->id],'method' => 'DELETE']) !!}
        {!! Form::hidden('hidden', $hidden ?? '',['class' => 'form-control']) !!}
        {!! Form::submit('Apagar Curso', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection