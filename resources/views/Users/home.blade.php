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
@isset($disciplines)
<ul class="list-group list-group-flush">
  @for ($i = 0; $i < count($disciplines); $i++)
      @if($i == 0 )
        <li class="list-group-item active">{{ $disciplines[$i]->acronym_discipline }}</li>
        <li class="list-group-item"><a href="{{$disciplines[$i]->acronym_career}}/{{$disciplines[$i]->acronym_discipline}}/{{$disciplines[$i]->group_from_students}}">{{ $disciplines[$i]->acronym_career }} - Grupo {{ $disciplines[$i]->group_from_students }}</a></li>
      @else 
      @if($disciplines[$i]->acronym_discipline == $disciplines[$i - 1]->acronym_discipline)
        <li class="list-group-item"><a href="{{$disciplines[$i]->acronym_career}}/{{$disciplines[$i]->acronym_discipline}}/{{$disciplines[$i]->group_from_students}}">{{ $disciplines[$i]->acronym_career }} - Grupo {{ $disciplines[$i]->group_from_students }}</a></li>
      @else
        <li class="list-group-item active">{{ $disciplines[$i]->acronym_discipline }}</li>
        <li class="list-group-item"><a href="{{$disciplines[$i]->acronym_career}}/{{$disciplines[$i]->acronym_discipline}}/{{$disciplines[$i]->group_from_students}}">{{ $disciplines[$i]->acronym_career }} - Grupo {{ $disciplines[$i]->group_from_students }}</a></li>
      @endif
    @endif
  @endfor
</ul>
@endisset

@endsection
