<?php

namespace App\Http\Controllers;

use App\Bitacora;
use App\DetalleServicioTercerizado;
use App\DetalleTrabajo;
use App\Http\Requests\DetalleTrabajoStoreRequest;
use App\Servicio_Tercerizado;
use Illuminate\Http\Request;

class DetalleServicioTercerizadoController extends Controller
{
    public function show($id_detalle_servicio_tercerizado){
        Bitacora::tupla_bitacora('Mostrar el detalle de servicio tercerizado :'.$id_detalle_servicio_tercerizado);//bitacora
        $servicio_tercerizado = Servicio_Tercerizado::findOrFail($id_detalle_servicio_tercerizado);

        return View('admin.gestionar_servicios_tercerizados.detalle_servicio_tercerizado', ['servicio_tercerizado' => $servicio_tercerizado]);
    }
    public function registrar($id_detalle_servicio_tercerizado){
        Bitacora::tupla_bitacora('Entro al formulario de registro de detalle de servicio tercerizado');//bitaacora
        $servicio_tercerizado = Servicio_Tercerizado::findOrFail($id_detalle_servicio_tercerizado);
        $detalle = DetalleTrabajo::all();
        return view('admin.gestionar_servicios_tercerizados.registrar_detalle_servicio_tercerizado', ['servicio_tercerizado'=>$servicio_tercerizado, 'detalles'=>$detalle]);
    }


    public function guardar(DetalleTrabajoStoreRequest $request,$id_detalle_servicio_tercerizado){
        $servicio_tercerizado = Servicio_Tercerizado::findOrFail($id_detalle_servicio_tercerizado);
        $detalle_servicio_tercerizado = new  DetalleServicioTercerizado($request->all());
        $detalle_servicio_tercerizado->id_st =$id_detalle_servicio_tercerizado;
        $detalle_servicio_tercerizado->save();
        Bitacora::tupla_bitacora('Registro el detalle de servicio tercerzida:'.$detalle_servicio_tercerizado->id);//bitacora
        return redirect()->route('admin.servicio_tercerizado.show',[$servicio_tercerizado->id]);
    }

    public function editar($id_servicio_tercerizado,$id_detalle_servicio_tercerizado){
        Bitacora::tupla_bitacora('Entro al formulario para editar vehiculo :'.$id_servicio_tercerizado);//bitacora
        $detalle_servicio_tercerizado =DetalleServicioTercerizado::findOrFail($id_detalle_servicio_tercerizado);
        $servicio = Servicio_Tercerizado::findOrFail($id_servicio_tercerizado);
        $detalle_trabajos = DetalleTrabajo::all();

        return View('admin.gestionar_servicios_tercerizados.editar_detalle_servicio_tercerizado', ['detalle_servicio_tercerizado' => $detalle_servicio_tercerizado,'detalle_trabajos'=>$detalle_trabajos,'servicio_tercerizado'=> $servicio]);
    }

    public function modificar(Request $request, $id_servicio_tercerizado, $id_detalle_servicio_tercerizado){
        $servicio_tercerizado = Servicio_Tercerizado::findOrFail($id_servicio_tercerizado);
        $detalle_servicio_tercerizado = DetalleServicioTercerizado::findOrFail($id_detalle_servicio_tercerizado);
        $detalle_servicio_tercerizado->id_detTrab=$request['id_detTrab'];
        $detalle_servicio_tercerizado->descripcion=$request['descripcion'];
        $detalle_servicio_tercerizado->fecha= $request['fecha'];
        $detalle_servicio_tercerizado->save();
        Bitacora::tupla_bitacora('Se Modifico el detalle de servicio:'.$detalle_servicio_tercerizado->id);//bitacora
        return redirect()->route('admin.servicio_tercerizado.show',[$servicio_tercerizado->id]);
    }

    public function eliminar($id_servicio_tercerizado, $id_detalle_servicio_tercerizado){
        $servicio_servicio = Servicio_Tercerizado::findOrFail($id_servicio_tercerizado);
        $detalle =DetalleServicioTercerizado::findOrFail($id_detalle_servicio_tercerizado);
        return view('admin.gestionar_servicios_tercerizados.eliminar_detalle_servicio_tercerizado',['servicio_tercerizado'=>$servicio_servicio,'detalle'=>$detalle]);
    }



    public function delete(Request $request, $id_servicio_tercerizado, $id_detalle_servicio_tercerizado){
        $servicio_servicio = Servicio_Tercerizado::findOrFail($id_servicio_tercerizado);
        $detalle =DetalleServicioTercerizado::findOrFail($id_detalle_servicio_tercerizado);
        if($request['eliminar'] == 'ELIMINAR'){
            $detalle->delete();
            return redirect()->route('admin.servicio_tercerizado.show',[$servicio_servicio->id]);
        }
        return redirect()->route('admin.detalle_servicio.eliminar', [$id_servicio_tercerizado,$id_detalle_servicio_tercerizado]);
    }
}
