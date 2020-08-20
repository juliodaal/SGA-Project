@extends('layouts.app')

@section('title', 'Lista Disciplinas')

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
@isset($disciplines)
<ul class="list-group list-group-flush">
    @foreach($disciplines as $discipline)
  <li class="list-group-item bg-transparent">{{ $discipline->acronym_discipline }} - {{ $discipline->name }}<a class="float-right" href="/admin/discipline/{{ $discipline->id }}/edit">Edit</a></li>
    @endforeach
</ul>
@endisset
@endsection