@extends('layouts.app')

@section('title', 'Lista de Estudantes')

@section('content')

@isset($students)
<div class="container-dates bg-primary position-fixed rounded" style="height: 80vh; width: 20vw; right: -100%; margin: 0; z-index: 1; transition: .3s ease-in-out;" id="container-dates">
    <nav>
    @isset($programs)
        <ul class="list-group list-group-flush">
        @foreach($programs as $program)
            <li class="list-group-item bg-transparent text-center"><a href="/home/{{$career}}/{{$discipline}}/{{$group}}/{{$program->date_to_class}}/{{$program->start_class}}/{{$program->end_class}}/date" class="text-light">{{ $program->date_to_class }} - {{ $program->start_class }} - {{ $program->end_class }}</a></li>
        @endforeach
        </ul>
    @endisset
    </nav>
</div>
<nav aria-label="breadcrumb">
  @isset($breadcrumbs)
    <ol class="breadcrumb">
      @foreach($breadcrumbs as $breadcrumb)
          @if ($loop->last)
              <li class="breadcrumb-item active text-primary" aria-current="page">{{ $breadcrumb }}</li>
          @else
              <li class="breadcrumb-item">{{ $breadcrumb }}</li>
          @endif
      @endforeach
    </ol>
  @endisset
</nav>
<button type="button" class="btn btn-primary mb-4" id="button-dates">Calendario</button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nombre Estudiante</th>
      <th scope="col">Número Estudiante</th>
      <th scope="col">Fecha</th>
      <th scope="col">Comienzo Aula</th>
      <th scope="col">Fin Aula</th>
      <th scope="col">Asistió?</th>
      <th scope="col">Ver Alumno</th>
    </tr>
  </thead>
  <tbody>
    @foreach($students as $student)
        <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->number_student }}</td>
            @isset($assisStudents)
            <td>{{ $date }}</td>
            <td>{{ $startTime }}</td>
            <td>{{ $endTime }}</td>
            @if(count($assisStudents))
            {{ $flagOne = false }}
            {{ $flag = false }}
                @foreach($assisStudents as $assisStudent)
                    @if($student->number_student == $assisStudent->number_student)
                        @if($flagOne == false)
                            <td><input type="checkbox" aria-label="Student Assistance" checked></td>
                            <?php $flagOne = true ?>
                            <?php $flag = true ?>
                        @endif
                    @else
                    <?php $flagOne = false ?>
                        @if ($loop->last)
                            @if($flag == false)
                                <td><input type="checkbox" aria-label="Student Assistance"></td> 
                            @endif
                        @endif   
                    @endif
                @endforeach
            @else
                <td><input type="checkbox" aria-label="Student Assistance"></td>
            @endif
            @if($assisStudents)
            <td><a href="/home/{{ $student->number_student }}/{{ $date }}/list/date">Ver</a></td>
            @else
            <td><a href="#">Ver</a></td>
            @endif
            @endisset
        </tr>
    @endforeach
  </tbody>
</table>
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