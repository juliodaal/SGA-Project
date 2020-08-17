@extends('layouts.template')

@section('title', 'Editar '.$program->acronym_career)

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
            <strong>Campos vazios</strong>
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

<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
  Apagar Programa
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apagar Programa?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Tem a certeza de querer apagar o <strong>Programa</strong>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        {!! Form::open(['action' => ['ProgramController@destroy',$program->id],'method' => 'DELETE']) !!}
        {!! Form::hidden('hidden', $hidden ?? '',['class' => 'form-control']) !!}
        {!! Form::submit('Apagar Programa', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
<div class="form-group">
    {!! Form::open(['action' => ['ProgramController@update',$program->id],'method' => 'put']) !!}
        {!! Form::label('acronym', 'Acronimo', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('acronym', $acronym ?? $program->acronym_career, ['class' => 'form-control']) !!}
        {!! Form::label('acronymDiscipline', 'Acronimo Disciplina', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('acronymDiscipline', $acronymDiscipline ?? $program->acronym_discipline, ['class' => 'form-control']) !!}
        {!! Form::label('numberProfessor', 'Numero Professor', ['class' => 'control-label mt-2']) !!}
        {!! Form::number('numberProfessor', $numberProfessor ?? $program->number_professor, ['class' => 'form-control']) !!}
        {!! Form::label('date', 'Data', ['class' => 'control-label mt-2']) !!}
        {!! Form::date('date', $date ?? $program->date_to_class, ['class' => 'form-control']) !!}
        {!! Form::label('startClass', 'Començo Aula', ['class' => 'control-label mt-2']) !!}
        {!! Form::time('startClass', $startClass ?? $program->start_class, ['class' => 'form-control']) !!}
        {!! Form::label('endClass', 'Fim Aula', ['class' => 'control-label mt-2']) !!}
        {!! Form::time('endClass', $endClass ?? $program->end_class, ['class' => 'form-control']) !!}
        {!! Form::label('classroomNumber', 'Numero Aula', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('classroomNumber', $classroomNumber ?? $program->classroom_number, ['class' => 'form-control']) !!}
        {!! Form::submit('Editar', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::reset('Limpar campos', ['class' => 'btn btn-warning mt-2']) !!}
    {!! Form::close() !!}
</div>

@endsection