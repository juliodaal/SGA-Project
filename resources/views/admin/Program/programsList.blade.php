@extends('layouts.app')

@section('title', 'Resultado Programas')

@section('content')
@isset($programs)
<ul class="list-group list-group-flush">
    @foreach($programs as $program)
        <li class="list-group-item bg-transparent">{{ $program->acronym_career }} - {{ $program->acronym_discipline }} - {{ $program->date_to_class }} - {{ $program->start_class }} - {{ $program->end_class }} - {{ $program->classroom_number }}<a class="float-right" href="/admin/program/{{$program->id}}/edit">Edit</a></li>
    @endforeach
</ul>
@endisset
@endsection