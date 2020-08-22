@extends('layouts.app')

@section('content')

@isset($students)
<ul class="list-group list-group-flush">
    @foreach($students as $student)
        <li class="list-group-item col-sm-7 my-1 mx-auto shadow-sm float-left d-flex justify-content-between align-items-center">
            <a href="">{{ $student->name }} - {{ $student->number_student }}</a>
            <input type="checkbox" aria-label="Student Assistance">
        </li>
    @endforeach
</ul>
@endisset

@endsection