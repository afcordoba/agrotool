<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear', function() {

   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('view:clear');

   return "Cleared!";

});


Route::group(['middleware' => 'visits'], function () {

    Route::get('restconf', array('as' => 'dashboard.index', 'uses' => 'Dashboard\DashboardController@index'));

    Route::group(['prefix' => 'charts'], function () {

        Route::any('shorter/{url}', array('as' => 'charts.ajax.shorter', 'uses' => 'Charts\Comparativo\AjaxController@shorter'));
        Route::any('getHash/{url}', array('as' => 'charts.ajax.get_hash', 'uses' => 'Charts\Comparativo\AjaxController@getHash'));
        
        Route::get('fecha/{type}', array('as' => 'charts.fecha.index', 'uses' =>'Charts\Fecha\ChartController@index'));
        Route::get('fecha/ajax/country', array('as' => 'charts.fecha.ajax.country', 'uses' =>'Charts\Fecha\AjaxController@country'));
        Route::get('fecha/ajax/zone', array('as' => 'charts.fecha.ajax.zone', 'uses' =>'Charts\Fecha\AjaxController@zone'));
        Route::get('fecha/ajax/variedad', array('as' => 'charts.fecha.ajax.variedad', 'uses' =>'Charts\Fecha\AjaxController@variedad')); 
        Route::get('public/fecha/{type}', array('as' => 'public.charts.fecha.show', 'uses' =>'Charts\Fecha\ChartController@show'));
        
        Route::get('comparativo/{type}', array('as' => 'charts.comparativo.index', 'uses' =>'Charts\Comparativo\ChartController@index'));
        Route::get('comparativo/ajax/country', array('as' => 'charts.comparativo.ajax.country', 'uses' =>'Charts\Comparativo\AjaxController@country'));
        Route::get('comparativo/ajax/zone', array('as' => 'charts.comparativo.ajax.zone', 'uses' =>'Charts\Comparativo\AjaxController@zone'));
        Route::get('comparativo/ajax/variedad', array('as' => 'charts.comparativo.ajax.variedad', 'uses' =>'Charts\Comparativo\AjaxController@variedad'));
        Route::get('comparativo/ajax/fecha', array('as' => 'charts.comparativo.ajax.fecha', 'uses' =>'Charts\Comparativo\AjaxController@fecha'));
        Route::get('public/comparativo/{type}', array('as' => 'public.charts.comparativo.show', 'uses' =>'Charts\Comparativo\ChartController@show'));
        
        Route::get('densidad/{type}', array('as' => 'charts.densidad.index', 'uses' =>'Charts\Densidad\ChartController@index'));
        Route::get('densidad/ajax/country', array('as' => 'charts.densidad.ajax.country', 'uses' =>'Charts\Densidad\AjaxController@country'));
        Route::get('densidad/ajax/zone', array('as' => 'charts.densidad.ajax.zone', 'uses' =>'Charts\Densidad\AjaxController@zone'));
        Route::get('densidad/ajax/variedad', array('as' => 'charts.densidad.ajax.variedad', 'uses' =>'Charts\Densidad\AjaxController@variedad'));
        Route::get('public/densidad/{type}', array('as' => 'public.charts.densidad.show', 'uses' =>'Charts\Densidad\ChartController@show'));
        
        Route::get('fenologico/{type}', array('as' => 'charts.fenologico.index', 'uses' =>'Charts\Fenologico\ChartController@index'));
        Route::get('fenologico/ajax/country', array('as' => 'charts.fenologico.ajax.country', 'uses' =>'Charts\Fenologico\AjaxController@country'));
        Route::get('fenologico/ajax/zone', array('as' => 'charts.fenologico.ajax.zone', 'uses' =>'Charts\Fenologico\AjaxController@zone'));
        Route::get('fenologico/ajax/variedad', array('as' => 'charts.fenologico.ajax.variedad', 'uses' =>'Charts\Fenologico\AjaxController@variedad'));
        Route::get('fenologico/ajax/fecha', array('as' => 'charts.fenologico.ajax.fecha', 'uses' =>'Charts\Fenologico\AjaxController@fecha'));
        Route::get('public/fenologico/{type}', array('as' => 'public.charts.fenologico.show', 'uses' =>'Charts\Fenologico\ChartController@show'));
        
        Route::get('recomendador/{type}', array('as' => 'charts.recomendador.index', 'uses' =>'Charts\Recomendador\ChartController@index'));
        Route::get('recomendador/ajax/country', array('as' => 'charts.recomendador.ajax.country', 'uses' =>'Charts\Recomendador\AjaxController@country'));
        Route::get('recomendador/ajax/zone', array('as' => 'charts.recomendador.ajax.zone', 'uses' =>'Charts\Recomendador\AjaxController@zone'));
        Route::get('recomendador/ajax/potencial', array('as' => 'charts.recomendador.ajax.potencial', 'uses' =>'Charts\Recomendador\AjaxController@potencial'));
        Route::get('recomendador/ajax/escenario', array('as' => 'charts.recomendador.ajax.escenario', 'uses' =>'Charts\Recomendador\AjaxController@escenario'));
        Route::get('recomendador/ajax/fecha', array('as' => 'charts.recomendador.ajax.fecha', 'uses' =>'Charts\Recomendador\AjaxController@fecha'));
        //Route::get('recomendador/ajax/table', array('as' => 'charts.recomendador.table', 'uses' =>'Charts\Recomendador\ChartController@table'));
        Route::get('public/recomendador/{type}', array('as' => 'public.charts.recomendador.show', 'uses' =>'Charts\Recomendador\ChartController@show'));
        
        Route::group(['middleware' => 'stats'], function () {
            Route::get('comparativo/ajax/data', array('as' => 'charts.comparativo.ajax.data', 'uses' =>'Charts\Comparativo\AjaxController@data'));
            Route::get('fecha/ajax/data', array('as' => 'charts.fecha.ajax.data', 'uses' =>'Charts\Fecha\AjaxController@data'));
            Route::get('densidad/ajax/data', array('as' => 'charts.densidad.ajax.data', 'uses' =>'Charts\Densidad\AjaxController@data'));
            Route::get('fenologico/ajax/data', array('as' => 'charts.fenologico.ajax.data', 'uses' =>'Charts\Fenologico\AjaxController@data'));
            Route::get('recomendador/ajax/data', array('as' => 'charts.recomendador.ajax.data', 'uses' =>'Charts\Recomendador\AjaxController@data'));   
        });
    });   
        Route::get('/test', function () {
            dd($GLOBALS);

        });    
    Route::group(['middleware' => 'auth2'], function () {


        Route::get('/', array('as' => 'dashboard.index', 'uses' => 'Dashboard\DashboardController@index'));
        Route::group(['prefix' => 'dashboard'], function () {
            Route::get('index', array('as' => 'dashboard.index', 'uses' => 'Dashboard\DashboardController@index'));
            Route::get('stats/byreport', array('as' => 'dashboard.statsbyreport', 'uses' => 'Dashboard\AjaxController@statsByReport'));
            Route::get('stats/byuser', array('as' => 'dashboard.statsbyuser', 'uses' => 'Dashboard\AjaxController@statsByUser'));
        });   


        Route::get('users/export', array('as' => 'users.export', 'uses' => 'UserController@export'));
        Route::resource('users', 'UserController');

        Route::resource('roles', 'RoleController');
        Route::resource('permissions', 'PermissionController');

        Route::group(['prefix' => 'data'], function () {

            Route::get('comparativo/export', array('as' => 'data.comparativo.export', 'uses' => 'Data\ComparativoController@export'));
            Route::get('densidad/export', array('as' => 'data.densidad.export', 'uses' => 'Data\DensidadController@export'));
            Route::get('fecha/export', array('as' => 'data.fecha.export', 'uses' => 'Data\FechaController@export'));
            Route::get('fenologico/export', array('as' => 'data.fenologico.export', 'uses' => 'Data\FenologicoController@export'));
            Route::get('recomendador/export', array('as' => 'data.recomendador.export', 'uses' => 'Data\RecomendadorController@export'));

            Route::post('comparativo/import', array('as' => 'data.comparativo.import', 'uses' => 'Data\ComparativoController@import'));
            Route::post('densidad/import', array('as' => 'data.densidad.import', 'uses' => 'Data\DensidadController@import'));
            Route::post('fecha/import', array('as' => 'data.fecha.import', 'uses' => 'Data\FechaController@import'));
            Route::post('fenologico/import', array('as' => 'data.fenologico.import', 'uses' => 'Data\FenologicoController@import'));
            Route::post('recomendador/import', array('as' => 'data.recomendador.import', 'uses' => 'Data\RecomendadorController@import'));

            Route::post('comparativo/inline', array('as' => 'data.comparativo.inline', 'uses' => 'Data\ComparativoController@inline'));

            Route::delete('densidad/bulkdelete', array('as' => 'data.densidad.bulkdelete', 'uses' => 'Data\DensidadController@bulkDelete'));


            Route::resource('comparativo', 'Data\ComparativoController',['as' => 'data']);
            Route::resource('densidad', 'Data\DensidadController',['as' => 'data']);
            Route::resource('fecha', 'Data\FechaController',['as' => 'data']);
            Route::resource('fenologico', 'Data\FenologicoController',['as' => 'data']);
            Route::resource('recomendador', 'Data\RecomendadorController',['as' => 'data']);
        });      



        Route::group(['prefix' => 'stats'], function () {
            Route::get('general', array('as' => 'stats.general.index', 'uses' =>'Stats\GeneralController@index'));
            Route::get('report', array('as' => 'stats.report.index', 'uses' =>'Stats\ReportController@index'));
        });        
    });


    /*Route::group(['middleware' => 'auth'], function () {

        Route::get('/', array('as' => 'dashboard.index', 'uses' => 'Dashboard\DashboardController@index'));

        Route::get('/logout', function(){
           Auth::logout();
           return Redirect::to('login');
        })->name('logout'); 

        Route::group(['prefix' => 'dashboard'], function () {
            Route::get('index', array('as' => 'dashboard.index', 'uses' => 'Dashboard\DashboardController@index'));
            Route::get('stats/byreport', array('as' => 'dashboard.statsbyreport', 'uses' => 'Dashboard\AjaxController@statsByReport'));
            Route::get('stats/byuser', array('as' => 'dashboard.statsbyuser', 'uses' => 'Dashboard\AjaxController@statsByUser'));
        });       

        Route::get('users/export', array('as' => 'users.export', 'uses' => 'UserController@export'));
        Route::resource('users', 'UserController');

        Route::resource('roles', 'RoleController');
        Route::resource('permissions', 'PermissionController');

        Route::group(['prefix' => 'data'], function () {

            Route::get('comparativo/export', array('as' => 'data.comparativo.export', 'uses' => 'Data\ComparativoController@export'));
            Route::get('densidad/export', array('as' => 'data.densidad.export', 'uses' => 'Data\DensidadController@export'));
            Route::get('fecha/export', array('as' => 'data.fecha.export', 'uses' => 'Data\FechaController@export'));
            Route::get('fenologico/export', array('as' => 'data.fenologico.export', 'uses' => 'Data\FenologicoController@export'));
            Route::get('recomendador/export', array('as' => 'data.recomendador.export', 'uses' => 'Data\RecomendadorController@export'));

            Route::post('comparativo/import', array('as' => 'data.comparativo.import', 'uses' => 'Data\ComparativoController@import'));
            Route::post('densidad/import', array('as' => 'data.densidad.import', 'uses' => 'Data\DensidadController@import'));
            Route::post('fecha/import', array('as' => 'data.fecha.import', 'uses' => 'Data\FechaController@import'));
            Route::post('fenologico/import', array('as' => 'data.fenologico.import', 'uses' => 'Data\FenologicoController@import'));
            Route::post('recomendador/import', array('as' => 'data.recomendador.import', 'uses' => 'Data\RecomendadorController@import'));
            
            Route::post('comparativo/inline', array('as' => 'data.comparativo.inline', 'uses' => 'Data\ComparativoController@inline'));
            
            Route::delete('densidad/bulkdelete', array('as' => 'data.densidad.bulkdelete', 'uses' => 'Data\DensidadController@bulkDelete'));
            
            
            Route::resource('comparativo', 'Data\ComparativoController',['as' => 'data']);
            Route::resource('densidad', 'Data\DensidadController',['as' => 'data']);
            Route::resource('fecha', 'Data\FechaController',['as' => 'data']);
            Route::resource('fenologico', 'Data\FenologicoController',['as' => 'data']);
            Route::resource('recomendador', 'Data\RecomendadorController',['as' => 'data']);
        });      



        Route::group(['prefix' => 'stats'], function () {
            Route::get('general', array('as' => 'stats.general.index', 'uses' =>'Stats\GeneralController@index'));
            Route::get('report', array('as' => 'stats.report.index', 'uses' =>'Stats\ReportController@index'));
        });  

    });*/
    
          
    
    /*Route::group(['prefix' => 'A43432D517B1F916B6E64DDE37489'], function () {
        Route::get('/', array('as' => 'dashboard.index', 'uses' => 'Dashboard\DashboardController@index'));

               
    });*/
    
    Auth::routes();
});



