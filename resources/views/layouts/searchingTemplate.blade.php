@extends('layouts.app')

@section('title', 'Buscar')

@section('content')
@if(session()->has('error'))
    <div class="alert alert-warning alert-dismissible fade show rounded border border-warning" role="alert">
        <strong>{{ session()->get('error') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    {!! session()->forget('error') !!}
@endif
@if(session()->has('successfully'))
    <div class="alert alert-success alert-dismissible fade show rounded border border-success" role="alert">
        <strong>{{ session()->get('successfully') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    {!! session()->forget('successfully') !!}
@endif
@if($errors->isNotEmpty())
        <div class="alert alert-warning alert-dismissible fade show rounded border border-warning" role="alert">
            <strong>Campo Vacío</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
@endif
<div class="form-group">
    <small id="emailHelp" class="form-text text-muted">
        Busca <strong>@yield('lookingFor')</strong> a través de los siguientes inputs
    </small>
    @yield('form')
</div>
@endsection