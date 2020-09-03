@extends('layouts.app')

@section('title', 'Home')

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
<nav aria-label="breadcrumb">
  @isset($breadcrumbs)
    <ol class="breadcrumb">
      @foreach($breadcrumbs as $breadcrumb)
          @if ($loop->last)
              <li class="breadcrumb-item active text-primary" aria-current="page">{{ $breadcrumb }}</li>
          @else
              <li class="breadcrumb-item">{{ $breadcrumb }}</li>
          @endif
      @endforeach
    </ol>
  @endisset
</nav>
@if(session()->get('type_user') == 2)
@if(!($disciplines->isEmpty()))
<ul class="list-group list-group-flush">
  @for ($i = 0; $i < count($disciplines); $i++)
      @if($i == 0 )
        <li class="list-group-item rounded bg-transparent text-dark font-weight-bold">{{ $disciplines[$i]->acronym_discipline }}</li>
        <li class="list-group-item bg-transparent pl-4 d-flex justify-content-between">{{ $disciplines[$i]->acronym_career }} - Grupo {{ $disciplines[$i]->group_from_students }}<a href="home/{{$disciplines[$i]->acronym_career}}/{{$disciplines[$i]->acronym_discipline}}/{{$disciplines[$i]->group_from_students}}">Ver</a></li>
      @else 
      @if($disciplines[$i]->acronym_discipline == $disciplines[$i - 1]->acronym_discipline)
        <li class="list-group-item bg-transparent pl-4 d-flex justify-content-between">{{ $disciplines[$i]->acronym_career }} - Grupo {{ $disciplines[$i]->group_from_students }}<a href="home/{{$disciplines[$i]->acronym_career}}/{{$disciplines[$i]->acronym_discipline}}/{{$disciplines[$i]->group_from_students}}">Ver</a></li>
      @else
        <li class="list-group-item rounded bg-transparent text-dark font-weight-bold">{{ $disciplines[$i]->acronym_discipline }}</li>
        <li class="list-group-item bg-transparent pl-4 d-flex justify-content-between">{{ $disciplines[$i]->acronym_career }} - Grupo {{ $disciplines[$i]->group_from_students }}<a href="home/{{$disciplines[$i]->acronym_career}}/{{$disciplines[$i]->acronym_discipline}}/{{$disciplines[$i]->group_from_students}}">Ver</a></li>
      @endif
    @endif
  @endfor
</ul>
@else
<div class="jumbotron text-center">
    <h1 class="display-4">No hay disciplinas, cursos o grupos de estudiantes disponibles :(</h1>
</div>
@endif
@else
@if(session()->get('type_user') == 1)
@if(count($cursos))
  <ul class="list-group list-group-flush">
    @for ($i = 0; $i < count($cursos); $i++)
        @if($i == 0 )
          <li class="list-group-item rounded bg-transparent text-dark font-weight-bold">{{ $cursos[$i]->acronym_career_from_careers }}</li>
          <li class="list-group-item bg-transparent pl-4 d-flex justify-content-between">{{ $cursos[$i]->acronym_discipline_from_disciplines }}<a href="home/{{$cursos[$i]->acronym_career_from_careers}}/{{$cursos[$i]->acronym_discipline_from_disciplines}}/{{$group}}">Ver</a></li>
        @else 
          @if($cursos[$i]->acronym_career_from_careers == $cursos[$i - 1]->acronym_career_from_careers)
            <li class="list-group-item bg-transparent pl-4 d-flex justify-content-between">{{ $cursos[$i]->acronym_discipline_from_disciplines }}<a href="home/{{$cursos[$i]->acronym_career_from_careers}}/{{$cursos[$i]->acronym_discipline_from_disciplines}}/{{$group}}">Ver</a></li>
          @else
            <li class="list-group-item rounded bg-transparent text-dark font-weight-bold">{{ $cursos[$i]->acronym_career_from_careers }}</li>
            <li class="list-group-item bg-transparent pl-4 d-flex justify-content-between">{{ $cursos[$i]->acronym_discipline_from_disciplines }}<a href="home/{{$cursos[$i]->acronym_career_from_careers}}/{{$cursos[$i]->acronym_discipline_from_disciplines}}/{{$group}}">Ver</a></li>
          @endif
        @endif
    @endfor
  </ul>
@else
<div class="jumbotron text-center">
    <h1 class="display-4">No hay disciplinas registradas  en tus cursos :(</h1>
    <p>Has click en <a href="{{ url('/home/inscriptions') }}">Inscripciones</a> para inscribir tus disciplinas.</p>
</div>
@endif
@endif
@endif

@endsection
