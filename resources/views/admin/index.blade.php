


<!-- Hacer que la clave se genere automaticamente -->


@extends('layouts.template')

@section('title', 'Admin')

@section('content')

<div class="form-group">
    {!! Form::open(['url' => 'foo/bar']) !!}
        <h3>Adicionar Disciplinas</h3>
        {!! Form::label('acronym', 'Acronimo', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('acronym', $acronym ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('name', 'Nome Disciplina', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('name', $name ?? '', ['class' => 'form-control']) !!}
        <small id="emailHelp" class="form-text text-muted">
            Envia informacão de uma lista de <strong>disciplinas</strong> através de un fichero excel
        </small>
        {!! Form::label('document', 'Enviar através por documento mt-2') !!}
        {!! Form::file('document', ['class' => 'form-control-file']) !!}
        {!! Form::submit('Enviar', ['class' => 'btn btn-primary mt-2']) !!}
    {!! Form::close() !!}
</div>

<div class="form-group">
    {!! Form::open(['url' => 'foo/bar']) !!}
        <h3>Adicionar Aluno</h3>
        {!! Form::label('name', 'Nome', ['class' => 'control-label mt-2']) !!} 
        {!! Form::text('name', $name ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('lastName', 'Ultimo Nome', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('lastName', $lastName ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('numberStudent', 'Numero Estudante', ['class' => 'control-label mt-2']) !!}
        {!! Form::number('numberStudent', $numberStudent ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('email', 'Email Estudante', ['class' => 'control-label mt-2']) !!}
        {!! Form::email('email', $email ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('emailConfirm', 'Confirmar email Estudante', ['class' => 'control-label mt-2']) !!}
        {!! Form::email('emailConfirm', $emailConfirm ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('password', 'Senha', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('password', $password ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('passwordConfirm', 'Confirmar senha', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('passwordConfirm', $passwordConfirm ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('cardId', 'Id Cartão', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('cardId', $cardId ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('addStudentToDiscipline', 'Adicionar Aluno à Disciplina', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('addStudentToDiscipline', $addStudentToDiscipline ?? '', ['class' => 'form-control']) !!}
        <small id="emailHelp" class="form-text text-muted">
            Envia informacão de uma lista de <strong>alunos</strong> através de un fichero excel
        </small>
        {!! Form::label('document', 'Enviar através por documento', ['class' => 'control-label mt-2']) !!}
        {!! Form::file('document', ['class' => 'form-control-file']) !!}
        {!! Form::submit('Enviar', ['class' => 'btn btn-primary mt-2']) !!}
    {!! Form::close() !!}
</div>

<div class="form-group">
    {!! Form::open(['url' => 'foo/bar']) !!}
        <h3>Adicionar Professor</h3>
        {!! Form::label('name', 'Nome', ['class' => 'control-label mt-2']) !!} 
        {!! Form::text('name', $name ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('lastName', 'Ultimo Nome', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('lastName', $lastName ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('numberProfessor', 'Numero Professor', ['class' => 'control-label mt-2']) !!}
        {!! Form::number('numberProfessor', $numberProfessor ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('email', 'Email Professor', ['class' => 'control-label mt-2']) !!}
        {!! Form::email('email', $email ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('emailConfirm', 'Confirmar email Professor', ['class' => 'control-label mt-2']) !!}
        {!! Form::email('emailConfirm', $emailConfirm ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('password', 'Senha', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('password', $password ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('passwordConfirm', 'Confirmar senha', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('passwordConfirm', $passwordConfirm ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('cardId', 'Id Cartão', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('cardId', $cardId ?? '', ['class' => 'form-control']) !!}
        <small id="emailHelp" class="form-text text-muted">
            Envia informacão de uma lista de <strong>professores</strong> através de un fichero excel
        </small>
        {!! Form::label('document', 'Enviar através por documento', ['class' => 'control-label mt-2']) !!}
        {!! Form::file('document', ['class' => 'form-control-file']) !!}
        {!! Form::submit('Enviar', ['class' => 'btn btn-primary mt-2']) !!}
    {!! Form::close() !!}
</div>

<div class="form-group">
    {!! Form::open(['url' => 'foo/bar']) !!}
        <h3>Adicionar Horarios</h3>
        {!! Form::label('acronymCareer', 'Nome Turma', ['class' => 'control-label mt-2']) !!} 
        {!! Form::text('acronymCareer', $acronymCareer ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('acronymDiscipline', 'Código Disciplina', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('acronymDiscipline', $acronymDiscipline ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('numberProfessor', 'Numero Professor', ['class' => 'control-label mt-2']) !!}
        {!! Form::number('numberProfessor', $numberProfessor ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('date', 'Data Aula', ['class' => 'control-label mt-2']) !!}
        {!! Form::date('date', $date ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('startTime', 'Comenco Aula', ['class' => 'control-label mt-2']) !!}
        {!! Form::time('startTime', $startTime ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('endTime', 'Fim Aula', ['class' => 'control-label mt-2']) !!}
        {!! Form::time('endTime', $endTime ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('classRoom', 'Numero de Sala', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('classRoom', $classRoom ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('year', 'Ano', ['class' => 'control-label mt-2']) !!}
        {!! Form::number('year', $year ?? '', ['class' => 'form-control']) !!}
        <small id="emailHelp" class="form-text text-muted">
            Envia informacão de uma lista de <strong>Horarios</strong> através de un fichero excel
        </small>
        {!! Form::label('document', 'Enviar através por documento', ['class' => 'control-label mt-2']) !!}
        {!! Form::file('document', ['class' => 'form-control-file']) !!}
        {!! Form::submit('Enviar', ['class' => 'btn btn-primary mt-2']) !!}
    {!! Form::close() !!}
</div>

<div class="form-group">
    {!! Form::open(['url' => 'foo/bar']) !!}
        <h3>Adicionar Aluno à Turma</h3>
        {!! Form::label('acronymCareer', 'Nome Turma', ['class' => 'control-label mt-2']) !!} 
        {!! Form::text('acronymCareer', $acronymCareer ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('numberStudent', 'Número Estudantes', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('numberStudent', $numberStudent ?? '', ['class' => 'form-control']) !!}
        <small id="emailHelp" class="form-text text-muted">
            Envia informacão de uma lista de <strong>Turmas Associadas a estudantes</strong> através de un fichero excel
        </small>
        {!! Form::label('document', 'Enviar através por documento', ['class' => 'control-label mt-2']) !!}
        {!! Form::file('document', ['class' => 'form-control-file']) !!}
        {!! Form::submit('Enviar', ['class' => 'btn btn-primary mt-2']) !!}
    {!! Form::close() !!}
</div>

<div class="form-group">
{!! Form::open(['url' => 'foo/bar']) !!}
        <h3>Adicionar Administrador</h3>
        {!! Form::label('name', 'Nome', ['class' => 'control-label mt-2']) !!} 
        {!! Form::text('name', $name ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('lastName', 'Ultimo Nome', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('lastName', $lastName ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('email', 'Email Administrador', ['class' => 'control-label mt-2']) !!}
        {!! Form::email('email', $email ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('emailConfirm', 'Confirmar email Administrador', ['class' => 'control-label mt-2']) !!}
        {!! Form::email('emailConfirm', $emailConfirm ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('password', 'Senha', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('password', $password ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('passwordConfirm', 'Confirmar senha', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('passwordConfirm', $passwordConfirm ?? '', ['class' => 'form-control']) !!}
        {!! Form::label('cardId', 'Id Cartão', ['class' => 'control-label mt-2']) !!}
        {!! Form::text('cardId', $cardId ?? '', ['class' => 'form-control']) !!}
        <small id="emailHelp" class="form-text text-muted">
            Envia informacão de uma lista de <strong>professores</strong> através de un fichero excel
        </small>
        {!! Form::label('document', 'Enviar através por documento', ['class' => 'control-label mt-2']) !!}
        {!! Form::file('document', ['class' => 'form-control-file']) !!}
        {!! Form::submit('Enviar', ['class' => 'btn btn-primary mt-2']) !!}
    {!! Form::close() !!}
</div>

@endsection