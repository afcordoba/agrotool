@extends('layouts.app')
@section('title', 'Comparativo de Variedades')
@section('content-header')
    @component('components.content-header')
      @slot('title')
        Comparativo de Variedades
      @endslot
    @endcomponent
@endsection
@section('css')
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/green.css') }}"
@endsection
@section('content')
          @component('components.alerts')
          @endcomponent
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Comparativo de Variedades</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                    <form method="get">
                        <input name="q" type="text" class="form-control input-sm submit_on_enter" placeholder="Buscar" value="{{ $request->get('q') }}">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                  </form>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>         
              <div class="box-body no-padding">
            <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <a href="{{route('data.comparativo.create')}}" type="button" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Importar datos</a>
                  <a href="{{ route('data.densidad.bulkdelete') }}"  data-method="delete" data-token="{{csrf_token()}}" data-confirm="Estas seguro?" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i> Borrar</a>
                  <a target="_blank" href="{{ route('public.charts.comparativo.show',['type' => 'soja']) }}" class="btn btn-default btn-sm"><i class="fa fa-chrome"></i> Vista pública</a>
                  <a href="{{ asset('xls/comportamiento.xlsx') }}" class="btn btn-default btn-sm"><i class="fa fa-file-excel-o"></i> Descargar template</a>
                  <a href="{{ route('data.comparativo.export') }}" class="btn btn-default btn-sm"><i class="fa fa-download"></i> Exportar</a>
                </div>
                <!-- /.btn-group -->
                <!--<button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>-->
                <div class="pull-right">
                    
                    {{ $data->links() }}
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm">Ordenar</button>
                        <button  type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" style="right: 0; left: auto;" role="menu">
                            <li><a href="{{ route('data.comparativo.index', $request->except('sort') + ['sort' => 'ASC']) }}">Genotipo Asc</a></li>
                            <li><a href="{{ route('data.comparativo.index', $request->except('sort') + ['sort' => 'DESC']) }}">Genotipo Desc</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.pull-right -->
              </div>    
            <!-- /.box-header -->
            <div class="table-responsive mailbox-messages">
              <table class="table table-hover table-striped">
                <tbody><tr>
                  <th style="width: 10px"></th>
                  @foreach($fields as  $field => $name)
                  <th>{{ $name }}</th>
                  @endforeach
                </tr>
                @foreach ($data as $i => $row)
                <tr>
                    <td>
                        <input type="checkbox" value="{{$row->id}}" name="ids" id="ids">
                    </td>
                    @foreach($fields  as $field => $name)
                    <td class="edit" id="{{ $row->id}}-{{$field}}">{{ $row->$field }}</td>
                    @endforeach
                </tr>                
                @endforeach
                
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
<div class="box-footer no-padding">
              <div class="mailbox-controls">
                  <div class="pull-right" style="margin-bottom: 5px">
                    {{ $data->links() }}
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
  </div>

@endsection
@section('js')
<!-- iCheck -->
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('js/webpack.mix.js') }}"></script>
<script src="{{ asset('js/laravel.js') }}"></script>
<!-- Page Script -->
<script>
    
$(document).ready(function() {

  $('.submit_on_enter').keydown(function(event) {
    // enter has keyCode = 13, change it if you want to use another button
    if (event.keyCode == 13) {
      this.form.submit();
      return false;
    }
  });
  
$(".edit").on("dblclick",function(e){
   $(this).editable('/manejo_exacto/public/data/comparativo/inline', {
         id   : 'id',
         name : 'value',
         indicator : 'Saving...',
         tooltip   : 'Click to edit...'         
     });
});  

});

  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

  });
</script>
@endsection