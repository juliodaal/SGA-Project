@extends('layouts.app')

@section('title', 'Resultado Programas')

@section('content')
@if(!$programs->isEmpty())
<table class="table">
<thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Curso</th>
      <th scope="col">Disciplina</th>
      <th scope="col">Data</th>
      <th scope="col">Començo Aula</th>
      <th scope="col">Fim Aula</th>
      <th scope="col">Sala</th>
      <th scope="col">Edit</th>
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
      <td><a href="/admin/program/{{$program->id}}/edit">Edit</a></td>
    </tr>
    @endforeach
</tbody>
</table>
@else
<div class="jumbotron text-center">
    <h1 class="display-4">Programa não encontrado :(</h1>
</div>
@endif
@endsection