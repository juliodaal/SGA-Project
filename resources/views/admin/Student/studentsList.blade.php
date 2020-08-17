@extends('layouts.template')

@section('title', 'Resultado Estudantes')

@section('content')
@isset($students)
<ul class="list-group list-group-flush">
    @foreach($students as $student)
        <li class="list-group-item bg-transparent">{{ $student->name }}<a class="float-right" href="/admin/student/{{$student->id}}/edit">Edit</a></li>
    @endforeach
</ul>
@endisset
@endsection