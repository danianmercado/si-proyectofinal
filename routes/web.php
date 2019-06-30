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

use Illuminate\Support\Facades\Route;

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
            Route::get('index', 'ClienteController@index')->name('admin.cliente.index')->middleware('can:cliente.index');
            Route::get('show/{id_cliente}','ClienteController@show')->name('admin.cliente.show')->middleware('can:cliente.show');
            Route::get('registrar', 'ClienteController@registrar')->name('admin.cliente.registrar')->middleware('can:cliente.create');
            Route::post('guardar','ClienteController@guardar')->name('admin.cliente.guardar')->middleware('can:cliente.create');
            Route::get('editar/{id_cliente}','ClienteController@editar')->name('admin.cliente.editar')->middleware('can:cliente.edit');
            Route::put('modificar/{id_cliente}','ClienteController@modificar')->name('admin.cliente.modificar')->middleware('can:cliente.edit');
            Route::get('eliminar/{id_cliente}','ClienteController@eliminar')->name('admin.cliente.eliminar')->middleware('can:cliente.delete');
            Route::delete('delete/{id_cliente}','ClienteController@delete')->name('admin.cliente.delete')->middleware('can:cliente.delete');
        });
//////////////////////trabajador//////////////////

   Route::group(['prefix'=>'trabajador'], function (){
        Route::get('index', 'TrabajadorController@index')->name('admin.trabajador.index')->middleware('can:trabajador.index');
        Route::get('show/{id_trabajador}','TrabajadorController@show')->name('admin.trabajador.show')->middleware('can:trabajador.show');
        Route::get('registrar', 'TrabajadorController@registrar')->name('admin.trabajador.registrar')->middleware('can:trabajador.create');
        Route::post('guardar','TrabajadorController@guardar')->name('admin.trabajador.guardar')->middleware('can:trabajador.create');
        Route::get('editar/{id_trabajador}','TrabajadorController@editar')->name('admin.trabajador.editar')->middleware('can:trabajador.edit');
        Route::put('modificar/{id_trabajador}','TrabajadorController@modificar')->name('admin.trabajador.modificar')->middleware('can:trabajador.edit');
        Route::get('eliminar/{id_trabajador}','TrabajadorController@eliminar')->name('admin.trabajador.eliminar')->middleware('can:trabajador.delete');
        Route::delete('delete/{id_trabajador}','TrabajadorController@delete')->name('admin.trabajador.delete')->middleware('can:trabajador.delete');
    });
    //////////////////////administrativo//////////////////
    Route::group(['prefix'=>'administrativo'], function (){
        Route::get('index', 'AdministrativoController@index')->name('admin.administrativo.index')->middleware('can:admin.index');
        Route::get('show/{id_administrativo}','AdministrativoController@show')->name('admin.administrativo.show')->middleware('can:admin.show');
        Route::get('registrar', 'AdministrativoController@registrar')->name('admin.administrativo.registrar')->middleware('can:admin.create');
        Route::post('guardar','AdministrativoController@guardar')->name('admin.administrativo.guardar')->middleware('can:admin.create');
        Route::get('editar/{id_administrativo}','AdministrativoController@editar')->name('admin.administrativo.editar')->middleware('can:admin.edit');
        Route::put('modificar/{id_administrativo}','AdministrativoController@modificar')->name('admin.administrativo.modificar')->middleware('can:admin.edit');
        Route::get('eliminar/{id_administrativo}','AdministrativoController@eliminar')->name('admin.administrativo.eliminar')->middleware('can:admin.delete');
        Route::delete('delete/{id_administrativo}','AdministrativoController@delete')->name('admin.administrativo.delete')->middleware('can:admin.delete');
    });





////////////     VEHICULO ///////////////////////////////////////////////////////////
        Route::group(['prefix'=>'vehiculo'], function (){
            Route::get('index','VehiculoController@index')->name('admin.vehiculo.index')->middleware('can:vehiculo.index'); ///'admin.gestionar_vehiculo.index'
            Route::get('show/{id_vehiculo}','VehiculoController@show')->name('admin.vehiculo.show')->middleware('can:vehiculo.show');
            Route::get('registrar','VehiculoController@registrar')->name('admin.vehiculo.registrar')->middleware('can:vehiculo.create');//'admin.gestionar_vehiculo.registrar_vehiculo'
            Route::post('guardar','VehiculoController@guardar')->name('admin.vehiculo.guardar')->middleware('can:vehiculo.create');
            Route::get('editar/{id_vehiculo}','VehiculoController@editar')->name('admin.vehiculo.editar')->middleware('can:vehiculo.edit');
            Route::put('modificar/{id_vehiculo}','VehiculoController@modificar')->name('admin.vehiculo.modificar')->middleware('can:vehiculo.edit');
            Route::get('eliminar/{id_vehiculo}','VehiculoController@eliminar')->name('admin.vehiculo.eliminar')->middleware('can:vehiculo.delete');
            Route::delete('delete/{id_vehiculo}','VehiculoController@delete')->name('admin.vehiculo.delete')->middleware('can:vehiculo.delete');
        });

////////////     RECEPCION ///////////////////////////////////////////////////////////
    Route::group(['prefix'=>'recepcion'], function (){
        Route::get('index','RecepcionController@index')->name('admin.recepcion.index')->middleware('can:recepcion.index'); ///'admin.gestionar_recepcion.index'
        Route::get('show/{id_recepcion}','RecepcionController@show')->name('admin.recepcion.show')->middleware('can:recepcion.show');
        Route::get('registrar','RecepcionController@registrar')->name('admin.recepcion.registrar')->middleware('can:recepcion.create');//'admin.gestionar_recepcion.registrar_recepcion'
        Route::post('guardar','RecepcionController@guardar')->name('admin.recepcion.guardar')->middleware('can:recepcion.create');
        Route::get('editar/{id_recepcion}','RecepcionController@editar')->name('admin.recepcion.editar')->middleware('can:recepcion.edit');
        Route::put('modificar/{id_recepcion}','RecepcionController@modificar')->name('admin.recepcion.modificar')->middleware('can:recepcion.edit');
        Route::get('eliminar/{id_recepcion}','RecepcionController@eliminar')->name('admin.recepcion.eliminar')->middleware('can:recepcion.delete');
        Route::delete('delete/{id_recepcion}','RecepcionController@delete')->name('admin.recepcion.delete')->middleware('can:recepcion.delete');
    });
    ///////////   DIAGNOSTICO ///////////////////////////////////////////////////////////////////
    Route::group(['prefix'=>'diagnostico'], function (){
        Route::get('index','DiagnosticoController@index')->name('admin.diagnostico.index')->middleware('can:diagnostico.index');
        Route::get('show/{id_diagnostico}','DiagnosticoController@show')->name('admin.diagnostico.show')->middleware('can:diagnostico.show');
        Route::get('registrar','DiagnosticoController@registrar')->name('admin.diagnostico.registrar')->middleware('can:diagnostico.create');
        Route::post('guardar','DiagnosticoController@guardar')->name('admin.diagnostico.guardar')->middleware('can:diagnostico.create');
        Route::get('editar/{id_diagnostico}','DiagnosticoController@editar')->name('admin.diagnostico.editar')->middleware('can:diagnostico.edit');
        Route::put('modificar/{id_diagnostico}','DiagnosticoController@modificar')->name('admin.diagnostico.modificar')->middleware('can:diagnostico.edit');
        Route::get('eliminar/{id_diagnostico}','DiagnosticoController@eliminar')->name('admin.diagnostico.eliminar')->middleware('can:diagnostico.delete');
        Route::delete('delete/{id_diagnostico}','DiagnosticoController@delete')->name('admin.diagnostico.delete')->middleware('can:diagnostico.delete');
    });
    ///////////   ORDEN DE TRABAJO ///////////////////////////////////////////////////////////////////
    Route::group(['prefix'=>'orden_trabajo'], function (){
        Route::get('index','OrdenTrabajoController@index')->name('admin.orden_trabajo.index');
        Route::get('show/{id_orden_trabajo}','OrdenTrabajoController@show')->name('admin.orden_trabajo.show');
        Route::get('registrar','OrdenTrabajoController@registrar')->name('admin.orden_trabajo.registrar');
        Route::post('guardar','OrdenTrabajoController@guardar')->name('admin.orden_trabajo.guardar');
        Route::get('editar/{id_orden_trabajo}','OrdenTrabajoController@editar')->name('admin.orden_trabajo.editar');
        Route::put('modificar/{id_orden_trabajo}','OrdenTrabajoController@modificar')->name('admin.orden_trabajo.modificar');
        Route::get('eliminar/{id_orden_trabajo}','OrdenTrabajoController@eliminar')->name('admin.orden_trabajo.eliminar');
        Route::delete('delete/{id_orden_trabajo}','OrdenTrabajoController@delete')->name('admin.orden_trabajo.delete');
    });
    ///////////   ORDEN DE TRABAJO ///////////////////////////////////////////////////////////////////
    Route::group(['prefix'=>'nota_reparacion'], function (){
        Route::get('index','NotaReparacionController@index')->name('admin.nota_reparacion.index');
        Route::get('show/{id_nota_reparacion}','NotaReparacionController@show')->name('admin.nota_reparacion.show');
        Route::get('registrar','NotaReparacionController@registrar')->name('admin.nota_reparacion.registrar');
        Route::post('guardar','NotaReparacionController@guardar')->name('admin.nota_reparacion.guardar');
        Route::get('editar/{id_nota_reparacion}','NotaReparacionController@editar')->name('admin.nota_reparacion.editar');
        Route::put('modificar/{id_nota_reparacion}','NotaReparacionController@modificar')->name('admin.nota_reparacion.modificar');
        Route::get('eliminar/{id_nota_reparacion}','NotaReparacionController@eliminar')->name('admin.nota_reparacion.eliminar');
        Route::delete('delete/{id_nota_reparacion}','NotaReparacionController@delete')->name('admin.nota_reparacion.delete');
    });
    ///////////   DETALLE DE TRABAJO ///////////////////////////////////////////////////////////////////
    Route::group(['prefix'=>'detalle_trabajo'], function (){
        Route::get('index','DetalleTrabajoController@index')->name('admin.detalle_trabajo.index');
        Route::get('show/{id_detalle_trabajo}','DetalleTrabajoController@show')->name('admin.detalle_trabajo.show');
        Route::get('registrar','DetalleTrabajoController@registrar')->name('admin.detalle_trabajo.registrar');
        Route::post('guardar','DetalleTrabajoController@guardar')->name('admin.detalle_trabajo.guardar');
        Route::get('editar/{id_detalle_trabajo}','DetalleTrabajoController@editar')->name('admin.detalle_trabajo.editar');
        Route::put('modificar/{id_detalle_trabajo}','DetalleTrabajoController@modificar')->name('admin.detalle_trabajo.modificar');
        Route::get('eliminar/{id_detalle_trabajo}','DetalleTrabajoController@eliminar')->name('admin.detalle_trabajo.eliminar');
        Route::delete('delete/{id_detalle_trabajo}','DetalleTrabajoController@delete')->name('admin.detalle_trabajo.delete');
    });

///////////    SERVICIO ///////////////////////////////////////////////////////////////////
    Route::group(['prefix'=>'servicio'], function (){
        Route::get('index','ServicioController@index' )->name('admin.servicio.index');
        Route::get('show/{id_servicio}','ServicioController@show')->name('admin.servicio.show');
        Route::get('registrar','ServicioController@registrar')->name('admin.servicio.registrar');
        Route::post('guardar','ServicioController@guardar')->name('admin.servicio.guardar');
        Route::get('editar/{id_servicio}','ServicioController@editar')->name('admin.servicio.editar');
        Route::put('modificar/{id_servicio}','ServicioController@modificar')->name('admin.servicio.modificar');
        Route::get('eliminar/{id_servicio}','ServicioController@eliminar')->name('admin.servicio.eliminar');
        Route::delete('delete/{id_servicio}','ServicioController@delete')->name('admin.servicio.delete');

        Route::group(['prefix'=>'detalle_servicio'], function (){
            Route::get('show/{id_servicio}/{id_detalle}','DetalleServicioController@show')->name('admin.detalle_servicio.show');
            Route::get('registrar/{id_servicio}','DetalleServicioController@registrar')->name('admin.detalle_servicio.registrar');
            Route::post('guardar/{id_servicio}','DetalleServicioController@guardar')->name('admin.detalle_servicio.guardar');
            Route::get('editar/{id_servicio}/{id_detalle}','DetalleServicioController@editar')->name('admin.detalle_servicio.editar');
            Route::put('modificar/{id_servicio}/{id_detalle}','DetalleServicioController@modificar')->name('admin.detalle_servicio.modificar');
            Route::get('eliminar/{id_servicio}/{id_detalle}','DetalleServicioController@eliminar')->name('admin.detalle_servicio.eliminar');
            Route::delete('delete/{id_servicio}/{id_detalle}','DetalleServicioController@delete')->name('admin.detalle_servicio.delete');
        });
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

    //////////   DETALLE SERVICIO TERCERIZADO //////////////////////////////////////////////////////////
    Route::group(['prefix'=>'detalle_servicio_tercerizado'], function (){
        Route::get('index','DetalleServicioTercerizadoController@index')->name('admin.detalle_servicio_tercerizado.index');
        Route::get('show/{id_detalle_servicio_tercerizado}','DetalleServicioTercerizadoController@show')->name('admin.detalle_servicio_tercerizado.show');
        Route::get('registrar','DetalleServicioTercerizadoController@registrar' )->name('admin.detalle_servicio_tercerizado.registrar'); //'admin.gestionar_servicios_tercerizados.registrar_servicios_tercerizados'
        Route::post('guardar','DetalleServicioTercerizadoController@guardar')->name('admin.detalle_servicio_tercerizado.guardar');
        Route::get('editar/{id_detalle_servicio_tercerizado}','DetalleServicioTercerizadoController@editar')->name('admin.detalle_servicio_tercerizado.editar');
        Route::put('modificar/{id_detalle_servicio_tercerizado}','DetalleServicioTercerizadoController@modificar')->name('admin.detalle_servicio_tercerizado.modificar');
        Route::get('eliminar/{id_detalle_servicio_tercerizado}','DetalleServicioTercerizadoController@eliminar')->name('admin.detalle_servicio_tercerizado.eliminar');
        Route::delete('delete/{id_detalle_servicio_tercerizado}','DetalleServicioTercerizadoController@delete')->name('admin.detalle_servicio_tercerizado.delete');
    });


///////////    REPUESTO ///////////////////////////////////////////////////////////////////
Route::group(['prefix'=>'repuesto'], function (){
    Route::get('index','RepuestoController@index' )->name('admin.repuesto.index'); ///'admin.gestionar_repuesto.index'
    Route::get('show/{id_repuesto}','RepuestoController@show')->name('admin.repuesto.show');
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
    Route::get('show/{id_herramienta}','HerramientaController@show')->name('admin.herramienta.show');
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
    Route::get('show/{id_almacen}','AlmacenController@show')->name('admin.almacen.show');
    Route::get('registrar','AlmacenController@registrar')->name('admin.almacen.registrar');
    Route::post('guardar','AlmacenController@guardar')->name('admin.almacen.guardar');
    Route::get('editar/{id_almacen}','AlmacenController@editar')->name('admin.almacen.editar');
    Route::put('modificar/{id_almacen}','AlmacenController@modificar')->name('admin.almacen.modificar');
    Route::get('eliminar/{id_almacen}','AlmacenController@eliminar')->name('admin.almacen.eliminar');
    Route::delete('delete/{id_almacen}','AlmacenController@delete')->name('admin.almacen.delete');
});

///////////   INSUMOS //////////////////////////////////////////////////////////////////
Route::group(['prefix'=>'insumo'], function (){
    Route::get('index', 'InsumoController@index')->name('admin.insumo.index');
    Route::get('show/{id}', 'InsumoController@show')->name('admin.insumo.show');
    Route::get('registrar', 'InsumoController@registrar')->name('admin.insumo.registrar');
    Route::post('guardar', 'InsumoController@guardar')->name('admin.insumo.guardar');
    Route::get('editar/{id}', 'InsumoController@editar')->name('admin.insumo.editar');
    Route::put('modificar/{id}', 'InsumoController@modificar')->name('admin.insumo.modificar');
    Route::get('eliminar/{id}', 'InsumoController@eliminar')->name('admin.insumo.eliminar');
    Route::delete('delete/{id}', 'InsumoController@delete')->name('admin.insumo.delete');

});

///////////    STOCK DE INSUMOS ///////////////////////////////////////////////////////////////////
    Route::group(['prefix'=>'stock_insumo'], function (){
        Route::get('index','StockInsumoController@index' )->name('admin.stock_insumo.index'); ///'admin.gestionar_stock_insumo.index'
        Route::get('show/{id_stock_insumo}','StockInsumoController@show')->name('admin.stock_insumo.show');
        Route::get('registrar','StockInsumoController@registrar')->name('admin.stock_insumo.registrar');
        Route::post('guardar','StockInsumoController@guardar')->name('admin.stock_insumo.guardar');
        Route::get('editar/{id_stock_insumo}','StockInsumoController@editar')->name('admin.stock_insumo.editar');
        Route::put('modificar/{id_stock_insumo}','StockInsumoController@modificar')->name('admin.stock_insumo.modificar');
        Route::get('eliminar/{id_stock_insumo}','StockInsumoController@eliminar')->name('admin.stock_insumo.eliminar');
        Route::delete('delete/{id_stock_insumo}','StockInsumoController@delete')->name('admin.stock_insumo.delete');
    });

///////////    STOCK DE REPUESTOS ///////////////////////////////////////////////////////////////////
    Route::group(['prefix'=>'stock_repuesto'], function (){
        Route::get('index','StockRepuestoController@index' )->name('admin.stock_repuesto.index'); ///'admin.gestionar_stock_repuesto.index'
        Route::get('show/{id_stock_repuesto}','StockRepuestoController@show')->name('admin.stock_repuesto.show');
        Route::get('registrar','StockRepuestoController@registrar')->name('admin.stock_repuesto.registrar');
        Route::post('guardar','StockRepuestoController@guardar')->name('admin.stock_repuesto.guardar');
        Route::get('editar/{id_stock_repuesto}','StockRepuestoController@editar')->name('admin.stock_repuesto.editar');
        Route::put('modificar/{id_stock_repuesto}','StockRepuestoController@modificar')->name('admin.stock_repuesto.modificar');
        Route::get('eliminar/{id_stock_repuesto}','StockRepuestoController@eliminar')->name('admin.stock_repuesto.eliminar');
        Route::delete('delete/{id_stock_repuesto}','StockRepuestoController@delete')->name('admin.stock_repuesto.delete');
    });

///////////    STOCK DE HERRAMIENTAS ///////////////////////////////////////////////////////////////////
    Route::group(['prefix'=>'stock_herramienta'], function (){
        Route::get('index','StockHerramientaController@index' )->name('admin.stock_herramienta.index'); ///'admin.gestionar_stock_herramienta.index'
        Route::get('show/{id_stock_herramienta}','StockHerramientaController@show')->name('admin.stock_herramienta.show');
        Route::get('registrar','StockHerramientaController@registrar')->name('admin.stock_herramienta.registrar');
        Route::post('guardar','StockHerramientaController@guardar')->name('admin.stock_herramienta.guardar');
        Route::get('editar/{id_stock_herramienta}','StockHerramientaController@editar')->name('admin.stock_herramienta.editar');
        Route::put('modificar/{id_stock_herramienta}','StockHerramientaController@modificar')->name('admin.stock_herramienta.modificar');
        Route::get('eliminar/{id_stock_herramienta}','StockHerramientaController@eliminar')->name('admin.stock_herramienta.eliminar');
        Route::delete('delete/{id_stock_herramienta}','StockHerramientaController@delete')->name('admin.stock_herramienta.delete');
    });

///////////    INGRESO DE INSUMOS ///////////////////////////////////////////////////////////////////
Route::group(['prefix'=>'ingreso_insumo'], function (){
    Route::get('registrar','IngresoInsumoController@registrar')->name('admin.ingreso_insumo.registrar');
    Route::post('guardar','IngresoInsumoController@guardar')->name('admin.ingreso_insumo.guardar');
    Route::get('editar/{id_ingreso_insumo}','IngresoInsumoController@editar')->name('admin.ingreso_insumo.editar');
    Route::put('modificar/{id_ingreso_insumo}','IngresoInsumoController@modificar')->name('admin.ingreso_insumo.modificar');
});


///////////    INGRESO DE REPUESTOS ///////////////////////////////////////////////////////////////////
    Route::group(['prefix'=>'ingreso_repuesto'], function (){
        Route::get('registrar','IngresoRepuestoController@registrar')->name('admin.ingreso_repuesto.registrar');
        Route::post('guardar','IngresoRepuestoController@guardar')->name('admin.ingreso_repuesto.guardar');
        Route::get('editar/{id_ingreso_repuesto}','IngresoRepuestoController@editar')->name('admin.ingreso_repuesto.editar');
        Route::put('modificar/{id_ingreso_repuesto}','IngresoRepuestoController@modificar')->name('admin.ingreso_repuesto.modificar');
    });

       


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Repotes
Route::get('reportes/vehiculos','ReporteController@showVehiculosReporte');
