@extends('layouts.app')

@section('title', 'Editar '.$professor->name)

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
  Apagar Professor
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apagar Professor?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Tem a certeza de querer apagar o <strong>Professor</strong>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        {!! Form::open(['action' => ['ProfessorController@destroy',$professor->id],'method' => 'DELETE']) !!}
        {!! Form::hidden('hidden', $hidden ?? '',['class' => 'form-control']) !!}
        {!! Form::submit('Apagar Professor', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
<div class="form-group">
    {!! Form::open(['action' => ['ProfessorController@update',$professor->id],'method' => 'put']) !!}
        {!! Form::label('name', 'Nome Completo', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('name', $name ?? $professor->name, ['class' => 'form-control']) !!}
        {!! Form::label('numberProfessor', 'Numero Professor', ['class' => 'control-label mt-2']) !!}
        {!! Form::number('numberProfessor', $numberProfessor ?? $professor->number_professor, ['class' => 'form-control']) !!}
        {!! Form::label('email', 'Email Professor', ['class' => 'control-label mt-2']) !!}
        {!! Form::email('email', $email ?? $professor->email, ['class' => 'form-control']) !!}
        {!! Form::label('cardId', 'Id Cartão', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('cardId', $cardId ?? $professor->card_id, ['class' => 'form-control']) !!}
        {!! Form::label('studentCareer', 'Acronimo Turma', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('studentCareer', $studentCareer ?? $professor->acronym_career, ['class' => 'form-control']) !!}
        {!! Form::label('studentCareerTwo', 'Acronimo Turma 2 (Opcional)', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('studentCareerTwo', $studentCareerTwo ?? $professor->acronym_career_two, ['class' => 'form-control']) !!}
        {!! Form::label('studentCareerThree', 'Acronimo Turma 3 (Opcional)', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('studentCareerThree', $studentCareerThree ?? $professor->acronym_career_three, ['class' => 'form-control']) !!}
        {!! Form::label('professorDiscipline', 'Acronimo Disciplina', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('professorDiscipline', $professorDiscipline ?? $professor->professor_discipline, ['class' => 'form-control']) !!}
        {!! Form::label('professorDisciplineTwo', 'Acronimo Disciplina 2 (Opcional)', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('professorDisciplineTwo', $professorDisciplineTwo ?? $professor->professor_discipline_two, ['class' => 'form-control']) !!}
        {!! Form::label('professorDisciplineThree', 'Acronimo Disciplina 3 (Opcional)', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('professorDisciplineThree', $professorDisciplineThree ?? $professor->professor_discipline_three, ['class' => 'form-control']) !!}
        {!! Form::submit('Editar', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::reset('Limpar campos', ['class' => 'btn btn-warning mt-2']) !!}
    {!! Form::close() !!}
</div>

@endsection