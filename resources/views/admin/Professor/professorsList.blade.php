@extends('layouts.template')

@section('title', 'Resultado Professores')

@section('content')
@isset($professors)
<ul class="list-group list-group-flush">
    @foreach($professors as $professor)
        <li class="list-group-item bg-transparent">{{ $professor->name }}<a class="float-right" href="/admin/professor/{{$professor->id}}/edit">Edit</a></li>
    @endforeach
</ul>
@endisset
@endsection