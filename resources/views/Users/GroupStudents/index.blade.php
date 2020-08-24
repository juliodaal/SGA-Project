@extends('layouts.app')

@section('title', 'Lista de Estudantes')

@section('content')

@isset($students)
<div class="container-dates bg-primary position-fixed rounded" style="height: 80vh; width: 20vw; right: -100%; margin: 0; z-index: 1; transition: .3s ease-in-out;" id="container-dates">
    <nav>
    @isset($programs)
        <ul class="list-group list-group-flush">
        @foreach($programs as $program)
            <li class="list-group-item bg-transparent text-center"><a href="#" class="text-light">{{ $program->date_to_class }} - {{ $program->start_class }} - {{ $program->end_class }}</a></li>
        @endforeach
        </ul>
    @endisset
    </nav>
</div>
<button type="button" class="btn btn-primary" id="button-dates">Calendário</button>
<ul class="list-group list-group-flush">
    @foreach($students as $student)
        <li class="list-group-item col-sm-12 my-1 mx-auto shadow-sm float-left d-flex justify-content-between align-items-center">
            <a href="">{{ $student->name }} - {{ $student->number_student }}</a>
            <input type="checkbox" aria-label="Student Assistance">
        </li>
    @endforeach
</ul>

<script>
    const buttonDates = document.getElementById('button-dates')
    const containerDates = document.getElementById('container-dates')
    buttonDates.onclick = () => {
        if(containerDates.style.right == '0px'){
            containerDates.style.right = '-100%'
        } else {
            containerDates.style.right = '0px'
        }
    };
</script>
@endisset

@endsection