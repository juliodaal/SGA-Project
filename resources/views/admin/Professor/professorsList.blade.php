@extends('layouts.app')

@section('title', 'Resultado Professores')

@section('content')
@if(!$professors->isEmpty())
<ul class="list-group list-group-flush">
    @foreach($professors as $professor)
        <li class="list-group-item bg-transparent">{{ $professor->name }}<a class="float-right" href="/admin/professor/{{$professor->id}}/edit">Edit</a></li>
    @endforeach
</ul>
@else
<div class="jumbotron text-center">
    <h1 class="display-4">Professor não encontrado :(</h1>
</div>
@endif
@endsection