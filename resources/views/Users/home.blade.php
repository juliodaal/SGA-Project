@extends('layouts.app')

@section('title', 'Home')

@section('content')
<nav aria-label="breadcrumb">
  @isset($breadcrumbs)
    <ol class="breadcrumb">
      @foreach($breadcrumbs as $breadcrumb)
          @if ($loop->last)
              <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb }}</li>
          @else
              <li class="breadcrumb-item"><a href="#">{{ $breadcrumb }}</a></li>
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
        <li class="list-group-item active">{{ $disciplines[$i]->acronym_discipline }}</li>
        <li class="list-group-item"><a href="home/{{$disciplines[$i]->acronym_career}}/{{$disciplines[$i]->acronym_discipline}}/{{$disciplines[$i]->group_from_students}}">{{ $disciplines[$i]->acronym_career }} - Grupo {{ $disciplines[$i]->group_from_students }}</a></li>
      @else 
      @if($disciplines[$i]->acronym_discipline == $disciplines[$i - 1]->acronym_discipline)
        <li class="list-group-item"><a href="home/{{$disciplines[$i]->acronym_career}}/{{$disciplines[$i]->acronym_discipline}}/{{$disciplines[$i]->group_from_students}}">{{ $disciplines[$i]->acronym_career }} - Grupo {{ $disciplines[$i]->group_from_students }}</a></li>
      @else
        <li class="list-group-item active">{{ $disciplines[$i]->acronym_discipline }}</li>
        <li class="list-group-item"><a href="home/{{$disciplines[$i]->acronym_career}}/{{$disciplines[$i]->acronym_discipline}}/{{$disciplines[$i]->group_from_students}}">{{ $disciplines[$i]->acronym_career }} - Grupo {{ $disciplines[$i]->group_from_students }}</a></li>
      @endif
    @endif
  @endfor
</ul>
@else
<div class="jumbotron text-center">
    <h1 class="display-4">Não há disciplinas, cursos ou grupos de estudantes disponíveis :(</h1>
</div>
@endif
@else
@if(session()->get('type_user') == 1)
@if(!($cursos->isEmpty()))
  <ul class="list-group list-group-flush">
    @for ($i = 0; $i < count($cursos); $i++)
        @if($i == 0 )
          <li class="list-group-item active">{{ $cursos[$i]->acronym_career }}</li>
          <li class="list-group-item"><a href="home/{{$cursos[$i]->acronym_career}}/{{$cursos[$i]->acronym_discipline_from_disciplines}}/{{$group}}">{{ $cursos[$i]->acronym_discipline_from_disciplines }}</a></li>
        @else 
          @if($cursos[$i]->acronym_career == $cursos[$i - 1]->acronym_career)
            <li class="list-group-item"><a href="home/{{$cursos[$i]->acronym_career}}/{{$cursos[$i]->acronym_discipline_from_disciplines}}/{{$group}}">{{ $cursos[$i]->acronym_discipline_from_disciplines }}</a></li>
          @else
            <li class="list-group-item active">{{ $cursos[$i]->acronym_career }}</li>
            <li class="list-group-item"><a href="home/{{$cursos[$i]->acronym_career}}/{{$cursos[$i]->acronym_discipline_from_disciplines}}/{{$group}}">{{ $cursos[$i]->acronym_discipline_from_disciplines }}</a></li>
          @endif
        @endif
    @endfor
  </ul>
@else
<div class="jumbotron text-center">
    <h1 class="display-4">Não há disciplinas registadas nos teus cursos...</h1>
</div>
@endif
@endif
@endif

@endsection
