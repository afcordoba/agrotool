@extends($request->get('layout'))
@section('title', 'Comparativo de Variedades')
@section('content-header')
    @component('components.content-header')
      @slot('title')
        Comparativo de Variedades: {{ ucfirst($request->get('type')) }}
      @endslot
    @endcomponent
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="box box-success">
            <form role="form" id="form-chart" name="form-chart" method="get">
                <input type="hidden" name="type" id="email" value="{{ $request->get('email','none') }}"/>
                <input type="hidden" name="type" id="type" value="{{ $request->get('type') }}"/>
                <input type="hidden" name="report" id="report" value="comportamiento"/>
                <div class="box-body">
                    <div class="form-group">
                        <label>País</label>
                        <select id="country" name="country" class="form-control"></select>
                    </div>
                    <div class="form-group">
                        <label>Zonas de Ensayos</label>
                        <select id="zone" name="zone[]" class="form-control select2" multiple="multiple"></select>
                        <!--<p class="help-block">Lista de selección múltiple, puede seleccionar varias zonas.</p> -->                 
                    </div>
                    <div class="form-group">
                        @if ($request->get('type') == 'maiz')
                        <label>Híbrido 1</label>
                        @else
                        <label>Variedad 1</label>
                        @endif
                        <select id="variety1" name="variety1" class="form-control"></select>
                    </div>
                    <div class="form-group">
                        @if ($request->get('type') == 'maiz')
                        <label>Híbrido 2</label>
                        @else
                        <label>Variedad 2</label>
                        @endif
                        <select id="variety2" name="variety2" class="form-control"></select>
                    </div> 
                    @if ($request->get('type') == 'maiz' || $request->get('type') == 'trigo')
                    <div class="form-group">
                        <label>Fecha de Siembra</label>
                        <select id="f_siembra" name="f_siembra" class="form-control"></select>
                    </div> 
                    @endif
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Generar Reporte</button>
                </div>
            </form>
        </div>        
    </div>
    <div class="col-md-9">
        <div class="box box-success">
            <div class="box-body" style="min-height: 600px; overflow: hidden">
                <div id="chart-image"> 
                    <img src="{{ asset('images/map_'.$request->get('type').'.png') }}" style="width: 100%"/>
                </div>
                <div id="chart-container" class="chart" style="display:none; text-align: center">
                    @include('includes.share')
                    <img src="{{ asset('images/'.$request->get('type').'-comparativo1.jpg') }}" style="width: 100%"/>
                    <div id="tableChart1" class="text-right" style="display: none;">
                        <table class="table table-hover table-striped"><tbody>
                            <tr>
                            <td></td>
                            <td id="head1"></td>
                            <td id="head2"></td>
                            <td><strong>I.A</strong>.</td>
                            </tr>
                                <tr>
                                    <td><strong>Rendimiento Promedio</strong></td>
                                    <td id="rend1"></td>
                                    <td id="rend2"></td>
                                    <td id="rend3"></td>
                                </tr>
                          <tr>
                                    <td><strong>Índice</strong></td>
                                    <td id="indice1"></td>
                                    <td id="indice2"></td>
                                    <td id="indice3"></td>
                                </tr>                                
                        </tbody></table>
                    </div>
                    <canvas id="lineChart1" style="margin-top:40px; display: none;" height="500"></canvas>
                    <img src="{{ asset('images/'.$request->get('type').'-comparativo2.jpg') }}" style="margin-top:60px; width: 100%"/>
                    <div id="tableChart2" class="text-right" style="display: none;">
                        <table class="table table-hover table-striped"><tbody>
                            <tr>
                            <td></td>
                            <td id="head3"></td>
                            <td id="head4"></td>
                            </tr>
                                <tr>
                                    <td><strong>% Ganados</strong></td>
                                    <td id="ganados1"></td>
                                    <td id="ganados2"></td>
                                </tr>                              
                        </tbody></table>
                    </div>                    
                    <canvas id="lineChart2" style="margin-top:10px; display: none;" height="500"></canvas>
                </div>
                <div id="errorMessage" style="display:none; text-align: center">
                    <div class="alert alert-info alert-dismissible">
                        <h4><i class="icon fa fa-info"></i> Alerta</h4>
                        No existen suficiente cantidad de datos para procesar la consulta requerida. Por favor de seleccionar más zonas productivas en los filtros opcionales.
                    </div>                        
                </div>                
            </div>
        </div>         
    </div>    
</div>
@endsection
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #3c8dbc !important;
    border-color: #367fa9 !important;
    padding: 1px 10px !important;
    color: #fff !important;
}
</style>
@section('js')
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js') }}"></script>
<script src="{{ asset('https://rawgit.com/chartjs/chartjs-plugin-annotation/master/chartjs-plugin-annotation.js') }}"></script>
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/charts-comparativo.js') }}"></script>
@endsection