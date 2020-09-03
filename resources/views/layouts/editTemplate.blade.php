@extends('layouts.app')

@section('title', 'Editar')

@section('content')
@if($errors->isNotEmpty())
        <div class="alert alert-warning alert-dismissible fade show rounded border border-warning" role="alert">
            <strong>Campos Vacíos</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-warning alert-dismissible fade show rounded border border-warning" role="alert">
        <strong>{{ session()->get('error') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    {!! session()->forget('error') !!}
@endif
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
  Eliminar  @yield('name-button-delete')
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar @yield('name-button-delete') ? </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Esta seguro de que quiere eliminar <strong>@yield('name-button-delete')</strong>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        
        <form action="@yield('url')" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <input class="form-control" name="hidden" type="hidden" value="">
            <input class="btn btn-danger" type="submit" value="Eliminar @yield('name-button-delete')">
        </form>
      </div>
    </div>
  </div>
</div>

@yield('content-edit-area')

@endsection