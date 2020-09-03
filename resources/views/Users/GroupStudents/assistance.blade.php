@extends('layouts.app')

@section('title', 'Assistência')

@section('content')

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
<table class="table">
  <thead>
    <tr>
      <th scope="col">Número Estudante</th>
      <th scope="col">Fecha</th>
      <th scope="col">Aula</th>
      <th scope="col">Hora</th>
      <th scope="col"><span class="text-success">Entrada</span> / <span class="text-danger">Salida</span></th>
    </tr>
  </thead>
  @isset($assistances)
  <tbody>
    @foreach($assistances as $assistance)
    <tr>
      <td>{{ $assistance->number_student }}</td>
      <td>{{ $assistance->date_to_class }}</td>
      <td>{{ $assistance->classroom }}</td>
      @if($assistance->entry == 1)
      <td>{{ $assistance->startTime }}</td>
      <td><span class="text-success">Entrada</span></td>
      @else
      <td>{{ $assistance->endtime }}</td>
      <td><span class="text-danger">Salida</span></td>
      @endif
    </tr>
    @endforeach
  </tbody>
  @endisset
</table>
@endsection