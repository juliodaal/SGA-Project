@extends('layouts.app')

@section('title', 'Resultado Plano Educação')

@section('content')

@isset($plans)
<ul class="list-group list-group-flush">
  @for ($i = 0; $i < count($plans); $i++)
      @if($i == 0 )
        <li class="list-group-item bg-transparent">{{ $plans[$i]->acronym_career_from_careers }}</li>
        <li class="list-group-item">{{ $plans[$i]->acronym_discipline_from_disciplines }}<a class="float-right" href="/admin/plan/{{$plans[$i]->id}}/edit">Apagar</a></li>
      @else 
      @if($plans[$i]->acronym_career_from_careers == $plans[$i - 1]->acronym_career_from_careers)
        <li class="list-group-item">{{ $plans[$i]->acronym_discipline_from_disciplines }}<a class="float-right" href="/admin/plan/{{$plans[$i]->id}}/edit">Apagar</a></li>
      @else
        <li class="list-group-item bg-transparent">{{ $plans[$i]->acronym_career_from_careers }}<a class="float-right" href="/admin/professor/{{$professor->id}}/edit">Edit</a></li>
        <li class="list-group-item">{{ $plans[$i]->acronym_discipline_from_disciplines }}<a class="float-right" href="/admin/plan/{{$plans[$i]->id}}/edit">Apagar</a></li>
      @endif
    @endif
  @endfor
</ul>
@endisset
@endsection