@extends('layouts.app')

@section('title', 'Administrador')

@section('content')

@isset($error)
    <div class="alert alert-warning alert-dismissible fade show rounded border border-warning" role="alert">
        <strong>{{ $error }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endisset
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

<div class="accordion my-5" id="accordionExample">
<div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link text-left text-decoration-none" type="button" data-toggle="collapse"
                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Adicionar Curso
                </button>
                <span class="float-right"><a class="btn btn-info" href="/admin/career">Ver Cursos</a></span>
            </h2>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::open(['action' => 'CareerController@store','method' => 'post','files' => true]) !!}
                        {!! Form::label('acronym', 'Acronimo', ['class' => 'control-label mt-2']) !!}
                        {!! Form::text('acronym', $acronym ?? '', ['class' => 'form-control']) !!}
                        {!! Form::label('name', 'Nome Disciplina', ['class' => 'control-label mt-2']) !!}
                        {!! Form::text('name', $name ?? '', ['class' => 'form-control']) !!}
                        <small id="emailHelp" class="form-text text-muted">
                            Envia informacão de uma lista de <strong>cursos</strong> através de um fichero excel
                        </small>
                        {!! Form::label('document', 'Enviar através de um documento', ['class' => 'control-label mt-2']) !!}
                        {!! Form::file('document', ['class' => 'form-control-file']) !!}
                        {!! Form::submit('Enviar', ['class' => 'btn btn-primary mt-2']) !!}
                        {!! Form::reset('Limpar campos', ['class' => 'btn btn-warning mt-2']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
                <button class="btn btn-link text-left text-decoration-none" type="button" data-toggle="collapse"
                    data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    Adicionar Disciplinas
                </button>
                <span class="float-right"><a class="btn btn-info" href="/admin/discipline">Ver Disciplinas</a></span>
            </h2>
        </div>

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::open(['action' => 'DisciplineController@store','method' => 'post','files' => true]) !!}
                        {!! Form::label('acronym', 'Acronimo', ['class' => 'control-label mt-2']) !!}
                        {!! Form::text('acronym', $acronym ?? '', ['class' => 'form-control']) !!}
                        {!! Form::label('name', 'Nome Disciplina', ['class' => 'control-label mt-2']) !!}
                        {!! Form::text('name', $name ?? '', ['class' => 'form-control']) !!}
                        <small id="emailHelp" class="form-text text-muted">
                            Envia informacão de uma lista de <strong>disciplinas</strong> através de um fichero excel
                        </small>
                        {!! Form::label('document', 'Enviar através de um documento', ['class' => 'control-label mt-2']) !!}
                        {!! Form::file('document', ['class' => 'form-control-file']) !!}
                        {!! Form::submit('Enviar', ['class' => 'btn btn-primary mt-2']) !!}
                        {!! Form::reset('Limpar campos', ['class' => 'btn btn-warning mt-2']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
            <h2 class="mb-0">
                <button class="btn btn-link text-left text-decoration-none" type="button" data-toggle="collapse"
                    data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    Adicionar Estudante
                </button>
                <span class="float-right"><a class="btn btn-info" href="/admin/student">Ver Estudantes</a></span>
            </h2>
        </div>

        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                <div class="form-group">
                {!! Form::open(['action' => 'StudentController@store','method' => 'post','files' => true]) !!}
                    {!! Form::label('name', 'Nome', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('name', $name ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('lastName', 'Ultimo Nome', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('lastName', $lastName ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('numberStudent', 'Numero Estudante', ['class' => 'control-label mt-2']) !!}
                    {!! Form::number('numberStudent', $numberStudent ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('email', 'Email Estudante', ['class' => 'control-label mt-2']) !!}
                    {!! Form::email('email', $email ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('cardId', 'Id Cartão', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('cardId', $cardId ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('studentCareer', 'Acronimo Turma', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('studentCareer', $studentCareer ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('studentCareerTwo', 'Acronimo Turma 2 (Opcional)', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('studentCareerTwo', $studentCareerTwo ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('studentCareerThree', 'Acronimo Turma 3 (Opcional)', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('studentCareerThree', $studentCareerThree ?? '', ['class' => 'form-control']) !!}
                    <small id="emailHelp" class="form-text text-muted">
                        Envia informacão de uma lista de <strong>alunos</strong> através de um fichero excel
                    </small>
                    {!! Form::label('document', 'Enviar através de um documento', ['class' => 'control-label mt-2']) !!}
                    {!! Form::file('document', ['class' => 'form-control-file']) !!}
                    {!! Form::submit('Enviar', ['class' => 'btn btn-primary mt-2']) !!}
                    {!! Form::reset('Limpar campos', ['class' => 'btn btn-warning mt-2']) !!}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingFour">
            <h2 class="mb-0">
                <button class="btn btn-link text-left text-decoration-none" type="button" data-toggle="collapse"
                    data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                    Adicionar Professor
                </button>
                <span class="float-right"><a class="btn btn-info" href="/admin/professor">Ver Professores</a></span>
            </h2>
        </div>

        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
            <div class="card-body">
                <div class="form-group">
                {!! Form::open(['action' => 'ProfessorController@store','method' => 'post','files' => true]) !!}
                    {!! Form::label('name', 'Nome', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('name', $name ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('lastName', 'Ultimo Nome', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('lastName', $lastName ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('numberProfessor', 'Numero Professor', ['class' => 'control-label mt-2']) !!}
                    {!! Form::number('numberProfessor', $numberProfessor ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('email', 'Email Professor', ['class' => 'control-label mt-2']) !!}
                    {!! Form::email('email', $email ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('cardId', 'Id Cartão', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('cardId', $cardId ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('studentCareer', 'Acronimo Curso', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('studentCareer', $studentCareer ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('studentCareerTwo', 'Acronimo Curso 2 (Opcional)', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('studentCareerTwo', $studentCareerTwo ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('studentCareerThree', 'Acronimo Curso 3 (Opcional)', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('studentCareerThree', $studentCareerThree ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('professorDiscipline', 'Acronimo Disciplina', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('professorDiscipline', $professorDiscipline ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('professorDisciplineTwo', 'Acronimo Disciplina 2 (Opcional)', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('professorDisciplineTwo', $professorDisciplineTwo ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('professorDisciplineThree', 'Acronimo Disciplina 3 (Opcional)', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('professorDisciplineThree', $professorDisciplineThree ?? '', ['class' => 'form-control']) !!}
                    <small id="emailHelp" class="form-text text-muted">
                        Envia informacão de uma lista de <strong>professores</strong> através de um fichero excel
                    </small>
                    {!! Form::label('document', 'Enviar através de um documento', ['class' => 'control-label mt-2']) !!}
                    {!! Form::file('document', ['class' => 'form-control-file']) !!}
                    {!! Form::submit('Enviar', ['class' => 'btn btn-primary mt-2']) !!}
                    {!! Form::reset('Limpar campos', ['class' => 'btn btn-warning mt-2']) !!}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingFive">
            <h2 class="mb-0">
                <button class="btn btn-link text-left text-decoration-none" type="button" data-toggle="collapse"
                    data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                    Adicionar Programa
                </button>
                <span class="float-right"><a class="btn btn-info" href="/admin/program">Ver Programas</a></span>
            </h2>
        </div>

        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
            <div class="card-body">
                <div class="form-group">
                {!! Form::open(['action' => 'ProgramController@store','method' => 'post','files' => true]) !!}
                    {!! Form::label('acronymCareer', 'Acronimo Turma', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('acronymCareer', $acronymCareer ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('acronymDiscipline', 'Acronimo Disciplina', ['class' => 'control-label mt-2']) !!}
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
                    {!! Form::label('groupStudents', 'Grupo de Estudante', ['class' => 'control-label mt-2']) !!}
                    {!! Form::number('groupStudents', $groupStudents ?? '', ['class' => 'form-control']) !!}
                    <small id="emailHelp" class="form-text text-muted">
                        Envia informacão de uma lista de <strong>Horarios</strong> através de um fichero excel
                    </small>
                    {!! Form::label('document', 'Enviar através de um documento', ['class' => 'control-label mt-2']) !!}
                    {!! Form::file('document', ['class' => 'form-control-file']) !!}
                    {!! Form::submit('Enviar', ['class' => 'btn btn-primary mt-2']) !!}
                    {!! Form::reset('Limpar campos', ['class' => 'btn btn-warning mt-2']) !!}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @if(session()->get('type_user') == 4)
    <div class="card">
        <div class="card-header" id="headingSix">
            <h2 class="mb-0">
                <button class="btn btn-link text-left text-decoration-none" type="button" data-toggle="collapse"
                    data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                    Adicionar Administrador
                </button>
                <span class="float-right"><a class="btn btn-info" href="/admin/administrator/administrator">Ver
                        Administradores</a></span>
            </h2>
        </div>

        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
            <div class="card-body">
                <div class="form-group">
                {!! Form::open(['action' => 'AdministratorController@store','method' => 'post','files' => true]) !!}
                    {!! Form::label('name', 'Nome', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('name', $name ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('lastName', 'Ultimo Nome', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('lastName', $lastName ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('email', 'Email Administrador', ['class' => 'control-label mt-2']) !!}
                    {!! Form::email('email', $email ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('cardId', 'Id Cartão', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('cardId', $cardId ?? '', ['class' => 'form-control']) !!}
                    <small id="emailHelp" class="form-text text-muted">
                        Envia informacão de uma lista de <strong>professores</strong> através de um fichero excel
                    </small>
                    {!! Form::label('document', 'Enviar através de um documento', ['class' => 'control-label mt-2']) !!}
                    {!! Form::file('document', ['class' => 'form-control-file']) !!}
                    {!! Form::submit('Enviar', ['class' => 'btn btn-primary mt-2']) !!}
                    {!! Form::reset('Limpar campos', ['class' => 'btn btn-warning mt-2']) !!}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="card">
        <div class="card-header" id="headingSeven">
            <h2 class="mb-0">
                <button class="btn btn-link text-left text-decoration-none" type="button" data-toggle="collapse"
                    data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                    Adicionar Disciplina ao Curso
                </button>
                <span class="float-right"><a class="btn btn-info" href="/admin/plan">Ver
                        Planos Educação</a></span>
            </h2>
        </div>

        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
            <div class="card-body">
                <div class="form-group">
                {!! Form::open(['action' => 'EducationalPlanController@store','method' => 'post','files' => true]) !!}
                    {!! Form::label('acronymCareer', 'Acronimo Curso', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('acronymCareer', $acronymCareer ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('acronymDiscipline', 'Acronimo da Disciplina a Associar', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('acronymDiscipline', $acronymDiscipline ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('semester', 'Semestre', ['class' => 'control-label mt-2']) !!}
                    {!! Form::number('semester', $semester ?? '', ['class' => 'form-control']) !!}
                    <small id="emailHelp" class="form-text text-muted">
                        Envia informacão de uma lista de <strong>Planos de Educação</strong> através de um fichero excel
                    </small>
                    {!! Form::label('document', 'Enviar através de um documento', ['class' => 'control-label mt-2']) !!}
                    {!! Form::file('document', ['class' => 'form-control-file']) !!}
                    {!! Form::submit('Enviar', ['class' => 'btn btn-primary mt-2']) !!}
                    {!! Form::reset('Limpar campos', ['class' => 'btn btn-warning mt-2']) !!}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
