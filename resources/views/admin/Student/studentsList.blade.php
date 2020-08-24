@extends('layouts.app')

@section('title', 'Resultado Estudantes')

@section('content')
@if(!$students->isEmpty())
<ul class="list-group list-group-flush">
    @foreach($students as $student)
        <li class="list-group-item bg-transparent">{{ $student->name }}<a class="float-right" href="/admin/student/{{$student->id}}/edit">Edit</a></li>
    @endforeach
</ul>
@else
<div class="jumbotron text-center">
    <h1 class="display-4">Estudante não encontrado :(</h1>
</div>
@endif
@endsection