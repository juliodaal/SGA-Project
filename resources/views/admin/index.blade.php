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
            <strong>Campos Vacíos</strong>
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
                    Agregar Curso
                </button>
                <span class="float-right"><a class="btn btn-info" href="/admin/career">Ver Cursos</a></span>
            </h2>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::open(['action' => 'CareerController@store','method' => 'post','files' => true]) !!}
                        {!! Form::label('acronym', 'Acrónimo', ['class' => 'control-label mt-2']) !!}
                        {!! Form::text('acronym', $acronym ?? '', ['class' => 'form-control']) !!}
                        {!! Form::label('name', 'Nombre Disciplina', ['class' => 'control-label mt-2']) !!}
                        {!! Form::text('name', $name ?? '', ['class' => 'form-control']) !!}
                        <small id="emailHelp" class="form-text text-muted">
                            Envia información de una lista de <strong>cursos</strong> a través de un archivo excel
                        </small>
                        {!! Form::label('document', 'Enviar a través de un documento', ['class' => 'control-label mt-2']) !!}
                        {!! Form::file('document', ['class' => 'form-control-file']) !!}
                        {!! Form::submit('Enviar', ['class' => 'btn btn-primary mt-2']) !!}
                        {!! Form::reset('Limpiar campos', ['class' => 'btn btn-warning mt-2']) !!}
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
                    Agregar Disciplina
                </button>
                <span class="float-right"><a class="btn btn-info" href="/admin/discipline">Ver Disciplinas</a></span>
            </h2>
        </div>

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::open(['action' => 'DisciplineController@store','method' => 'post','files' => true]) !!}
                        {!! Form::label('acronym', 'Acrónimo', ['class' => 'control-label mt-2']) !!}
                        {!! Form::text('acronym', $acronym ?? '', ['class' => 'form-control']) !!}
                        {!! Form::label('name', 'Nombre Disciplina', ['class' => 'control-label mt-2']) !!}
                        {!! Form::text('name', $name ?? '', ['class' => 'form-control']) !!}
                        <small id="emailHelp" class="form-text text-muted">
                            Envia información de una lista de <strong>disciplinas</strong> a través de un archivo excel
                        </small>
                        {!! Form::label('document', 'Enviar a través de un documento', ['class' => 'control-label mt-2']) !!}
                        {!! Form::file('document', ['class' => 'form-control-file']) !!}
                        {!! Form::submit('Enviar', ['class' => 'btn btn-primary mt-2']) !!}
                        {!! Form::reset('Limpiar campos', ['class' => 'btn btn-warning mt-2']) !!}
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
                    Agregar Estudiante
                </button>
                <span class="float-right"><a class="btn btn-info" href="/admin/student">Ver Estudiantes</a></span>
            </h2>
        </div>

        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                <div class="form-group">
                {!! Form::open(['action' => 'StudentController@store','method' => 'post','files' => true]) !!}
                    {!! Form::label('name', 'Nombre', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('name', $name ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('lastName', 'Último Nombre', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('lastName', $lastName ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('numberStudent', 'Número Estudiante', ['class' => 'control-label mt-2']) !!}
                    {!! Form::number('numberStudent', $numberStudent ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('email', 'Email Estudiante', ['class' => 'control-label mt-2']) !!}
                    {!! Form::email('email', $email ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('cardId', 'Id Tarjeta', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('cardId', $cardId ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('studentCareer', 'Acrónimo Carrera', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('studentCareer', $studentCareer ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('studentCareerTwo', 'Acrónimo Carrera 2 (Opcional)', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('studentCareerTwo', $studentCareerTwo ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('studentCareerThree', 'Acrónimo Carrera 3 (Opcional)', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('studentCareerThree', $studentCareerThree ?? '', ['class' => 'form-control']) !!}
                    <small id="emailHelp" class="form-text text-muted">
                        Envia información de una lista de <strong>estudiantes</strong> a través de un archivo excel
                    </small>
                    {!! Form::label('document', 'Enviar a través de un documento', ['class' => 'control-label mt-2']) !!}
                    {!! Form::file('document', ['class' => 'form-control-file']) !!}
                    {!! Form::submit('Enviar', ['class' => 'btn btn-primary mt-2']) !!}
                    {!! Form::reset('Limpiar campos', ['class' => 'btn btn-warning mt-2']) !!}
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
                    Agregar Profesor
                </button>
                <span class="float-right"><a class="btn btn-info" href="/admin/professor">Ver Profesores</a></span>
            </h2>
        </div>

        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
            <div class="card-body">
                <div class="form-group">
                {!! Form::open(['action' => 'ProfessorController@store','method' => 'post','files' => true]) !!}
                    {!! Form::label('name', 'Nombre', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('name', $name ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('lastName', 'Último Nombre', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('lastName', $lastName ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('numberProfessor', 'Número Profesor', ['class' => 'control-label mt-2']) !!}
                    {!! Form::number('numberProfessor', $numberProfessor ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('email', 'Email Profesor', ['class' => 'control-label mt-2']) !!}
                    {!! Form::email('email', $email ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('cardId', 'Id Tarjeta', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('cardId', $cardId ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('studentCareer', 'Acrónimo Carrera', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('studentCareer', $studentCareer ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('studentCareerTwo', 'Acrónimo Carrera 2 (Opcional)', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('studentCareerTwo', $studentCareerTwo ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('studentCareerThree', 'Acrónimo Carrera 3 (Opcional)', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('studentCareerThree', $studentCareerThree ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('professorDiscipline', 'Acrónimo Disciplina', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('professorDiscipline', $professorDiscipline ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('professorDisciplineTwo', 'Acrónimo Disciplina 2 (Opcional)', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('professorDisciplineTwo', $professorDisciplineTwo ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('professorDisciplineThree', 'Acrónimo Disciplina 3 (Opcional)', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('professorDisciplineThree', $professorDisciplineThree ?? '', ['class' => 'form-control']) !!}
                    <small id="emailHelp" class="form-text text-muted">
                        Envia información de una lista de <strong>profesores</strong> a través de un fichero excel
                    </small>
                    {!! Form::label('document', 'Enviar a través de un documento', ['class' => 'control-label mt-2']) !!}
                    {!! Form::file('document', ['class' => 'form-control-file']) !!}
                    {!! Form::submit('Enviar', ['class' => 'btn btn-primary mt-2']) !!}
                    {!! Form::reset('Limpiar campos', ['class' => 'btn btn-warning mt-2']) !!}
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
                    Agregar Programa
                </button>
                <span class="float-right"><a class="btn btn-info" href="/admin/program">Ver Programas</a></span>
            </h2>
        </div>

        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
            <div class="card-body">
                <div class="form-group">
                {!! Form::open(['action' => 'ProgramController@store','method' => 'post','files' => true]) !!}
                    {!! Form::label('acronymCareer', 'Acrónimo Carrera', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('acronymCareer', $acronymCareer ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('acronymDiscipline', 'Acrónimo Disciplina', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('acronymDiscipline', $acronymDiscipline ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('numberProfessor', 'Número Profesor', ['class' => 'control-label mt-2']) !!}
                    {!! Form::number('numberProfessor', $numberProfessor ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('date', 'Fecha Aula', ['class' => 'control-label mt-2']) !!}
                    {!! Form::date('date', $date ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('startTime', 'Comienzo Aula', ['class' => 'control-label mt-2']) !!}
                    {!! Form::time('startTime', $startTime ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('endTime', 'Fin Aula', ['class' => 'control-label mt-2']) !!}
                    {!! Form::time('endTime', $endTime ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('classRoom', 'Número de Sala', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('classRoom', $classRoom ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('groupStudents', 'Grupo de Estudiantes', ['class' => 'control-label mt-2']) !!}
                    {!! Form::number('groupStudents', $groupStudents ?? '', ['class' => 'form-control']) !!}
                    <small id="emailHelp" class="form-text text-muted">
                        Envia información de una lista de <strong>Horarios</strong> a través de um fichero excel
                    </small>
                    {!! Form::label('document', 'Enviar a través de un documento', ['class' => 'control-label mt-2']) !!}
                    {!! Form::file('document', ['class' => 'form-control-file']) !!}
                    {!! Form::submit('Enviar', ['class' => 'btn btn-primary mt-2']) !!}
                    {!! Form::reset('Limpiar campos', ['class' => 'btn btn-warning mt-2']) !!}
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
                    Agregar Administrador
                </button>
                <span class="float-right"><a class="btn btn-info" href="/admin/administrator/administrator">Ver
                        Administradores</a></span>
            </h2>
        </div>

        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
            <div class="card-body">
                <div class="form-group">
                {!! Form::open(['action' => 'AdministratorController@store','method' => 'post','files' => true]) !!}
                    {!! Form::label('name', 'Nombre', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('name', $name ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('lastName', 'Último Nombre', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('lastName', $lastName ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('email', 'Email Administrador', ['class' => 'control-label mt-2']) !!}
                    {!! Form::email('email', $email ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('cardId', 'Id Tarjeta', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('cardId', $cardId ?? '', ['class' => 'form-control']) !!}
                    <small id="emailHelp" class="form-text text-muted">
                        Envia información de una lista de <strong>profesores</strong> a través de un archivo excel
                    </small>
                    {!! Form::label('document', 'Enviar a través de un documento', ['class' => 'control-label mt-2']) !!}
                    {!! Form::file('document', ['class' => 'form-control-file']) !!}
                    {!! Form::submit('Enviar', ['class' => 'btn btn-primary mt-2']) !!}
                    {!! Form::reset('Limpiar campos', ['class' => 'btn btn-warning mt-2']) !!}
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
                    Agregar Disciplina al Curso
                </button>
                <span class="float-right"><a class="btn btn-info" href="/admin/plan">Ver
                        Planos de Educación</a></span>
            </h2>
        </div>

        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
            <div class="card-body">
                <div class="form-group">
                {!! Form::open(['action' => 'EducationalPlanController@store','method' => 'post','files' => true]) !!}
                    {!! Form::label('acronymCareer', 'Acrónimo Carrera', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('acronymCareer', $acronymCareer ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('acronymDiscipline', 'Acrónimo de la Disciplina a Asociar', ['class' => 'control-label mt-2']) !!}
                    {!! Form::text('acronymDiscipline', $acronymDiscipline ?? '', ['class' => 'form-control']) !!}
                    {!! Form::label('semester', 'Semestre', ['class' => 'control-label mt-2']) !!}
                    {!! Form::number('semester', $semester ?? '', ['class' => 'form-control']) !!}
                    <small id="emailHelp" class="form-text text-muted">
                        Envia información de una lista de <strong>Planos de Educación</strong> a través de un fichero excel
                    </small>
                    {!! Form::label('document', 'Enviar a través de un documento', ['class' => 'control-label mt-2']) !!}
                    {!! Form::file('document', ['class' => 'form-control-file']) !!}
                    {!! Form::submit('Enviar', ['class' => 'btn btn-primary mt-2']) !!}
                    {!! Form::reset('Limpiar campos', ['class' => 'btn btn-warning mt-2']) !!}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
