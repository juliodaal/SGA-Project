@extends('layouts.app')

@section('title', 'Lista Cursos')

@section('content')
@isset($successfully)
    <div class="alert alert-success alert-dismissible fade show rounded border border-success" role="alert">
        <strong>{{ $successfully }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endisset
@isset($error)
    <div class="alert alert-warning alert-dismissible fade show rounded border border-warning" role="alert">
        <strong>{{ $error }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endisset
@isset($careers)
<ul class="list-group list-group-flush">
    @foreach($careers as $career)
  <li class="list-group-item bg-transparent">{{ $career->acronym_career }} - {{ $career->name }}<a class="float-right" href="/admin/career/{{ $career->id }}/edit">Edit</a></li>
    @endforeach
</ul>
@endisset
@endsection