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
            Route::get('show/{id_servicio}','ServicioController@show')->name('admin.vehiculo.show');
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
            Route::put('modificar/{id_servicio_tercerizado}','ServicioTercerizadoController@modificar')->name('admin.servicio_tercerozado.modificar');
            Route::get('eliminar/{id_servicio_tercerizado}','ServicioTercerizadoController@eliminar')->name('admin.servicio_tercerizado.eliminar');
            Route::delete('delete/{id_servicio_tercerizado}','ServicioTercerizadoController@delete')->name('admin.servicio_tercerizado.delete');
        });



        Route::group(['prefix'=>'herramienta'], function (){
            Route::get('index', function () {
                return view('admin.gestionar_herramienta.index');
            })->name('admin.herramienta.index');

            Route::get('registrar', function (){
                return view('admin.gestionar_herramienta.registrar_herramienta');
            })->name('admin.herramienta.registrar');
        });
        Route::group(['prefix'=>'almacen'], function (){
            Route::get('index', function () {
                return view('admin.gestionar_almacen.index');
            })->name('admin.almacen.index');

            Route::get('registrar', function (){
                return view('admin.gestionar_almacen.gestionar_almacen');
            })->name('admin.almacen.registrar');
        });
        Route::group(['prefix'=>'insumo'], function (){
            Route::get('index', function () {
                return view('admin.gestionar_insumo.index');
            })->name('admin.insumo.index');

            Route::get('registrar', function (){
                return view('admin.gestionar_insumo.gestionar_insumo');
            })->name('admin.insumo.registrar');
        });

        Route::group(['prefix'=>'repuesto'], function (){
            Route::get('index', function () {
                return view('admin.gestionar_repuestos.index');
            })->name('admin.repuesto.index');

            Route::get('registrar', function (){
                return view('admin.gestionar_repuestos.registrar_repuesto');
            })->name('admin.repuesto.registrar');
        });



});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

