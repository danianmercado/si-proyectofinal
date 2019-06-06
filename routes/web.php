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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('prueba', function(){
    return view('template.app');
});


Route::group(['prefix'=>'admin'], function (){
        Route::group(['prefix'=>'trabajador'], function (){
            Route::get('index', function () {
                return view('admin.gestionar_trabajador.index');
            })->name('admin.trabajador.index');

            Route::get('registrar', function (){
                return view('admin.gestionar_trabajador.registrar');
            })->name('admin.trabajador.registrar');
        });


/////////////    CLIENTE ////////////////////////////////////////////////////////
        Route::group(['prefix'=>'cliente'], function (){
            Route::get('index', 'ClienteController@index')->name('admin.cliente.index');
            Route::get('show/{id_cliente}','ClienteController@show')->name('admin.cliente.show');
            Route::get('registrar', 'ClienteController@registrar')->name('admin.cliente.registrar');
            Route::post('guardar','ClienteController@guardar')->name('admin.cliente.guardar');
            Route::get('editar/{id_cliente}','ClienteController@editar')->name('admin.cliente.editar');
            Route::put('modificar/{id_cliente}','ClienteController@modificar')->name('admin.cliente.modificar');
            Route::get('eliminar/{id_cliente}','ClienteController@eliminar')->name('admin.cliente.eliminar');
            Route::delete('delete/{id_cliente}','ClienteController@delete')->name('admin.cliente.delete');
        });
//////////////////////trabajador//////////////////

   Route::group(['prefix'=>'trabajador'], function (){
        Route::get('index', 'TrabajadorController@index')->name('admin.trabajador.index');
        Route::get('show/{id_trabajador}','TrabajadorController@show')->name('admin.trabajador.show');
        Route::get('registrar', 'TrabajadorController@registrar')->name('admin.trabajador.registrar');
        Route::post('guardar','TrabajadorController@guardar')->name('admin.trabajador.guardar');
        Route::get('editar/{id_trabajador}','TrabajadorController@editar')->name('admin.trabajador.editar');
        Route::put('modificar/{id_trabajador}','TrabajadorController@modificar')->name('admin.trabajador.modificar');
        Route::get('eliminar/{id_trabajador}','TrabajadorController@eliminar')->name('admin.trabajador.eliminar');
        Route::delete('delete/{id_trabajador}','TrabajadorController@delete')->name('admin.trabajador.delete');
    });
////////////     VEHICULO ///////////////////////////////////////////////////////////
        Route::group(['prefix'=>'vehiculo'], function (){
            Route::get('index','VehiculoController@index')->name('admin.vehiculo.index'); ///'admin.gestionar_vehiculo.index'
            Route::get('show/{id_vehiculo}','VehiculoController@show')->name('admin.vehiculo.show');
            Route::get('registrar','VehiculoController@registrar')->name('admin.vehiculo.registrar');//'admin.gestionar_vehiculo.registrar_vehiculo'
            Route::post('guardar','VehiculoController@guardar')->name('admin.vehiculo.guardar');
            Route::get('editar/{id_vehiculo}','VehiculoController@editar')->name('admin.vehiculo.editar');
            Route::put('modificar/{id_vehiculo}','VehiculoController@modificar')->name('admin.vehiculo.modificar');
            Route::get('eliminar/{id_vehiculo}','VehiculoController@eliminar')->name('admin.vehiculo.eliminar');
            Route::delete('delete/{id_vehiculo}','VehiculoController@delete')->name('admin.vehiculo.delete');
        });

////////////     RECEPCION ///////////////////////////////////////////////////////////
    Route::group(['prefix'=>'recepcion'], function (){
        Route::get('index','RecepcionController@index')->name('admin.recepcion.index'); ///'admin.gestionar_recepcion.index'
        Route::get('show/{id_recepcion}','RecepcionController@show')->name('admin.recepcion.show');
        Route::get('registrar','RecepcionController@registrar')->name('admin.recepcion.registrar');//'admin.gestionar_recepcion.registrar_recepcion'
        Route::post('guardar','RecepcionController@guardar')->name('admin.recepcion.guardar');
        Route::get('editar/{id_recepcion}','RecepcionController@editar')->name('admin.recepcion.editar');
        Route::put('modificar/{id_recepcion}','RecepcionController@modificar')->name('admin.recepcion.modificar');
        Route::get('eliminar/{id_recepcion}','RecepcionController@eliminar')->name('admin.recepcion.eliminar');
        Route::delete('delete/{id_recepcion}','RecepcionController@delete')->name('admin.recepcion.delete');
    });
    ///////////   DIAGNOSTICO ///////////////////////////////////////////////////////////////////
    Route::group(['prefix'=>'diagnostico'], function (){
        Route::get('index','DiagnosticoController@index')->name('admin.diagnostico.index');
        Route::get('show/{id_diagnostico}','DiagnosticoController@show')->name('admin.diagnostico.show');
        Route::get('registrar','DiagnosticoController@registrar')->name('admin.diagnostico.registrar');
        Route::post('guardar','DiagnosticoController@guardar')->name('admin.diagnostico.guardar');
        Route::get('editar/{id_diagnostico}','DiagnosticoController@editar')->name('admin.diagnostico.editar');
        Route::put('modificar/{id_diagnostico}','DiagnosticoController@modificar')->name('admin.diagnostico.modificar');
        Route::get('eliminar/{id_diagnostico}','DiagnosticoController@eliminar')->name('admin.diagnostico.eliminar');
        Route::delete('delete/{id_diagnostico}','DiagnosticoController@delete')->name('admin.diagnostico.delete');
    });
///////////    SERVICIO ///////////////////////////////////////////////////////////////////
        Route::group(['prefix'=>'servicio'], function (){
            Route::get('index','ServicioController@index' )->name('admin.servicio.index'); ///'admin.gestionar_servicio.index'
            Route::get('show/{id_servicio}','ServicioController@show')->name('admin.servicio.show');
            Route::get('registrar','ServicioController@registrar')->name('admin.servicio.registrar');
            Route::post('guardar','ServicioController@guardar')->name('admin.servicio.guardar');
            Route::get('editar/{id_servicio}','ServicioController@editar')->name('admin.servicio.editar');
            Route::put('modificar/{id_servicio}','ServicioController@modificar')->name('admin.servicio.modificar');
            Route::get('eliminar/{id_servicio}','ServicioController@eliminar')->name('admin.servicio.eliminar');
            Route::delete('delete/{id_servicio}','ServicioController@delete')->name('admin.servicio.delete');
        });
//////////    SERVICIO TERCERIZADO //////////////////////////////////////////////////////////
        Route::group(['prefix'=>'servicio_tercerizado'], function (){
            Route::get('index','ServicioTercerizadoController@index')->name('admin.servicio_tercerizado.index');//'admin.gestionar_servicios_tercerizados.index'
            Route::get('show/{id_servicio_tercerizado}','ServicioTercerizadoController@show')->name('admin.servicio_tercerizado.show');
            Route::get('registrar','ServicioTercerizadoController@registrar' )->name('admin.servicio_tercerizado.registrar'); //'admin.gestionar_servicios_tercerizados.registrar_servicios_tercerizados'
            Route::post('guardar','ServicioTercerizadoController@guardar')->name('admin.servicio_tercerizado.guardar');
            Route::get('editar/{id_servicio_tercerizado}','ServicioTercerizadoController@editar')->name('admin.servicio_tercerizado.editar');
            Route::put('modificar/{id_servicio_tercerizado}','ServicioTercerizadoController@modificar')->name('admin.servicio_tercerizado.modificar');
            Route::get('eliminar/{id_servicio_tercerizado}','ServicioTercerizadoController@eliminar')->name('admin.servicio_tercerizado.eliminar');
            Route::delete('delete/{id_servicio_tercerizado}','ServicioTercerizadoController@delete')->name('admin.servicio_tercerizado.delete');
        });

///////////    REPUESTO ///////////////////////////////////////////////////////////////////
Route::group(['prefix'=>'repuesto'], function (){
    Route::get('index','RepuestoController@index' )->name('admin.repuesto.index'); ///'admin.gestionar_repuesto.index'
    Route::get('show/{id_repuesto}','RepuestoController@show')->name('admin.vehiculo.show');
    Route::get('registrar','RepuestoController@registrar')->name('admin.repuesto.registrar');
    Route::post('guardar','RepuestoController@guardar')->name('admin.repuesto.guardar');
    Route::get('editar/{id_repuesto}','RepuestoController@editar')->name('admin.repuesto.editar');
    Route::put('modificar/{id_repuesto}','RepuestoController@modificar')->name('admin.repuesto.modificar');
    Route::get('eliminar/{id_repuesto}','RepuestoController@eliminar')->name('admin.repuesto.eliminar');
    Route::delete('delete/{id_repuesto}','RepuestoController@delete')->name('admin.repuesto.delete');
});

///////////    HERRAMIENTA ///////////////////////////////////////////////////////////////////
Route::group(['prefix'=>'herramienta'], function (){
    Route::get('index','HerramientaController@index' )->name('admin.herramienta.index'); ///'admin.gestionar_herramienta.index'
    Route::get('show/{id_herramienta}','HerramientaController@show')->name('admin.vehiculo.show');
    Route::get('registrar','HerramientaController@registrar')->name('admin.herramienta.registrar');
    Route::post('guardar','HerramientaController@guardar')->name('admin.herramienta.guardar');
    Route::get('editar/{id_herramienta}','HerramientaController@editar')->name('admin.herramienta.editar');
    Route::put('modificar/{id_herramienta}','HerramientaController@modificar')->name('admin.herramienta.modificar');
    Route::get('eliminar/{id_herramienta}','HerramientaController@eliminar')->name('admin.herramienta.eliminar');
    Route::delete('delete/{id_herramienta}','HerramientaController@delete')->name('admin.herramienta.delete');
});


///////////    ALMACEN ///////////////////////////////////////////////////////////////////
Route::group(['prefix'=>'almacen'], function (){
    Route::get('index','AlmacenController@index' )->name('admin.almacen.index'); ///'admin.gestionar_almacen.index'
    Route::get('show/{id_almacen}','AlmacenController@show')->name('admin.vehiculo.show');
    Route::get('registrar','AlmacenController@registrar')->name('admin.almacen.registrar');
    Route::post('guardar','AlmacenController@guardar')->name('admin.almacen.guardar');
    Route::get('editar/{id_almacen}','AlmacenController@editar')->name('admin.almacen.editar');
    Route::put('modificar/{id_almacen}','AlmacenController@modificar')->name('admin.almacen.modificar');
    Route::get('eliminar/{id_almacen}','AlmacenController@eliminar')->name('admin.almacen.eliminar');
    Route::delete('delete/{id_almacen}','AlmacenController@delete')->name('admin.almacen.delete');
});


///////////    INGRESO DE INSUMOS ///////////////////////////////////////////////////////////////////
Route::group(['prefix'=>'ingreso_insumo'], function (){
    Route::get('registrar','IngresoInsumoController@registrar')->name('admin.ingreso_insumo.registrar');
    Route::post('guardar','IngresoInsumoController@guardar')->name('admin.ingreso_insumo.guardar');
    Route::get('editar/{id_ingreso_insumo}','Ingreso_InsumoController@editar')->name('admin.ingreso_insumo.editar');
    Route::put('modificar/{id_ingreso_insumo}','Ingreso_InsumoController@modificar')->name('admin.ingreso_insumo.modificar');
});

       


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

