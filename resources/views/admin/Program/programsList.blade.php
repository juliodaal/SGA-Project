@extends('layouts.app')

@section('title', 'Resultado Programas')

@section('content')
@if(!$programs->isEmpty())
<table class="table">
<thead>
    <tr>
      <th scope="col">Nombre Profesor</th>
      <th scope="col">Carrera</th>
      <th scope="col">Disciplina</th>
      <th scope="col">Fecha</th>
      <th scope="col">Comienzo Aula</th>
      <th scope="col">Fin Aula</th>
      <th scope="col">Sala</th>
      <th scope="col">Editar</th>
    </tr>
</thead>
<tbody>
    @foreach($programs as $program)
    <tr>
      <td>{{ $program->name }}</td>
      <td>{{ $program->acronym_career }}</td>
      <td>{{ $program->acronym_discipline }}</td>
      <td>{{ $program->date_to_class }}</td>
      <td>{{ $program->start_class }}</td>
      <td>{{ $program->end_class }}</td>
      <td>{{ $program->classroom_number }}</td>
      <td><a href="/admin/program/{{$program->id}}/edit">Editar</a></td>
    </tr>
    @endforeach
</tbody>
</table>
@else
<div class="jumbotron text-center">
    <h1 class="display-4">Programa no encontrado :(</h1>
</div>
@endif
@endsection