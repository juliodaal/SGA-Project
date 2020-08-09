@extends('layouts.template')

@section('title', 'Editar Disciplina')

@section('content')

<ul class="list-group list-group-flush">
    @foreach($disciplines as $discipline)
  <li class="list-group-item bg-transparent">{{ $discipline->name }}<a class="float-right" href="discipline/{{ $discipline->id }}/edit ">Edit</a></li>
    @endforeach
</ul>
@endsection