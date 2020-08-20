@extends('layouts.app')

@section('title', 'Home')

@section('content')
<nav aria-label="breadcrumb">
  @isset($breadcrumbs)
    <ol class="breadcrumb">
      @foreach($breadcrumbs as $breadcrumb)
          @if ($loop->last)
              <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb }}</li>
          @else
              <li class="breadcrumb-item"><a href="#">{{ $breadcrumb }}</a></li>
          @endif
      @endforeach
    </ol>
  @endisset
</nav>
@isset($disciplines)
<ul class="list-group list-group-flush">
  @foreach($disciplines as $discipline)
    <li class="list-group-item">{{ $discipline }}</li>
    <ul class="list-group list-group-flush">
      @foreach($discipline->cursos as $curso)
        <li class="list-group-item">{{ $curso }}</li>
      @endforeach
    </ul>
  @endforeach
</ul>
@endisset

@endsection
