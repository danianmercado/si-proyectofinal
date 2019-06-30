<?php

namespace App\Http\Controllers;

use App\DetalleServicioTercerizado;
use App\DetalleTrabajo;
use App\Http\Requests\DetalleTrabajoStoreRequest;
use App\Servicio_Tercerizado;
use Illuminate\Http\Request;

class DetalleServicioTercerizadoController extends Controller
{
    public function index(){
        $detalle_servicio_tercerizado = DetalleServicioTercerizado::all();
        return view('admin.gestionar_servicios_tercerizados.index',['detalle_servicios_tercerizados'=>$detalle_servicio_tercerizado]);
    }
    public function show($id_detalle_servicio_tercerizado){

        $detalle_servicio_tercerizado =  DetalleServicioTercerizado::findOrFail($id_detalle_servicio_tercerizado);
        return View('admin.gestionar_servicios_tercerizados.detalle_detalle_servicio_tercerizado', ['detalle_servicio_tercerizado' => $detalle_servicio_tercerizado]);
    }
    public function registrar(){
        $detalle = DetalleTrabajo::all();
        $servicio = Servicio_Tercerizado::all();
        return view('admin.gestionar_servicios_tercerizados.registrar_detalle_servicio_tercerizado', ['servicios'=>$servicio, 'detalles'=>$detalle]);
    }


    public function guardar(DetalleTrabajoStoreRequest $request){
        $detalle_servicio_tercerizado = new  DetalleServicioTercerizado($request->all());
        $detalle_servicio_tercerizado->save();
        return redirect()->route('admin.servicio_tercerizado.index');
    }

}
