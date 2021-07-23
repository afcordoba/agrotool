@extends('layouts.app')
@section('title', 'Importar Fenológico')
@section('content-header')
    @component('components.content-header', ['breadcrumb' => ['Fenológico' => route('data.fenologico.index')]])
        @slot('title')
            Importar Fenológico
        @endslot
    @endcomponent
@endsection
@section('css')
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/minimal/green.css') }}"
@endsection
@section('content')
    @component('components.alerts')
    @endcomponent        
<div class="box box-primary">
    <form class="form-horizontal" action="{{ route('data.fenologico.import')}}" method="POST" enctype="multipart/form-data"> 
        <div class='box-body'>  
            @csrf
              <div class="form-group">
                <label class="col-sm-3 control-label">
                  Modo de importación
                </label>
                  <div class="col-sm-9">
                  <div class="radio">
                      <label class="control-label">
                      <input type="radio" name="mode" value="add" class="flat-red" checked>
                      Añadir
                      </label>
                  </div>
                  <div class="radio">
                    <label class="control-label">
                      <input type="radio" name="mode" value="deleteAndAdd" class="flat-red">
                      Borrar todo y añadir
                      </label>
                  </div>                      
                  </div>
              </div>
            <div class="form-group">
                <label for="image" class="col-sm-3 control-label">Archivo</label>
                <div class="col-sm-9">
                    <input type="file" name="import-file" id="image">
                </div>
            </div>                     
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                    <button type="submit" class="btn btn-primary">Importar</button>
                </div>
            </div>
        </div>
    </form>            
</div>
@endsection
@section('js')
    <!-- iCheck -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
    <script src="{{ asset('js/laravel.js') }}"></script>
    <script>
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      radioClass   : 'iradio_minimal-green'
    })    
    </script>
@endsection

