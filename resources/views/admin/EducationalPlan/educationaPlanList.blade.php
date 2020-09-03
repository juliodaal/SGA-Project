@extends('layouts.app')

@section('title', 'Resultado Plano Educação')

@section('content')

@if(!$plans->isEmpty())
<ul class="list-group list-group-flush">
  @for ($i = 0; $i < count($plans); $i++)
      @if($i == 0 )
        <li class="list-group-item bg-transparent"><strong>{{ $plans[$i]->acronym_career_from_careers }}</strong></li>
        <li class="list-group-item bg-transparent ml-4">{{ $plans[$i]->acronym_discipline_from_disciplines }}<a class="float-right" href="/admin/plan/{{$plans[$i]->id}}/edit">Apagar</a></li>
      @else 
      @if($plans[$i]->acronym_career_from_careers == $plans[$i - 1]->acronym_career_from_careers)
        <li class="list-group-item bg-transparent ml-4">{{ $plans[$i]->acronym_discipline_from_disciplines }}<a class="float-right" href="/admin/plan/{{$plans[$i]->id}}/edit">Apagar</a></li>
      @else
        <li class="list-group-item bg-transparent active">{{ $plans[$i]->acronym_career_from_careers }}<a class="float-right" href="/admin/professor/{{$professor->id}}/edit">Edit</a></li>
        <li class="list-group-item bg-transparent ml-4">{{ $plans[$i]->acronym_discipline_from_disciplines }}<a class="float-right" href="/admin/plan/{{$plans[$i]->id}}/edit">Apagar</a></li>
      @endif
    @endif
  @endfor
</ul>
@else
<div class="jumbotron text-center">
    <h1 class="display-4">Plano de Edicação não encontrado :(</h1>
</div>
@endif
@endsection