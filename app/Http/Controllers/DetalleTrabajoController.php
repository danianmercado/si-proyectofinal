<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetalleTrabajoStoreRequest;
use App\OrdenTrabajo;
use App\Servicio;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Bitacora;//bitacora
use App\DetalleTrabajo;


class DetalleTrabajoController extends Controller
{
    public function index(){
        Bitacora::tupla_bitacora('Mostro la lista de Detalle de Trabajo');//bitacora
        $detalles =DetalleTrabajo::all();
        return view('admin.gestionar_detalle_trabajo.index',['detalles'=>$detalles]);
    }

    public function show($id_detalle_trabajo){
        Bitacora::tupla_bitacora('Mostrar el Detalle de Trabajo :'.$id_detalle_trabajo);//bitacora
        $detalle = DetalleTrabajo::findOrFail($id_detalle_trabajo);
        return View('admin.gestionar_detalle_trabajo.detalle_detalle_trabajo', ['detalle' => $detalle]);

    }
    public function registrar(){
        Bitacora::tupla_bitacora('Entro al formulario de registro de detalle de trabajo');//bitaacora
        $ordenes = OrdenTrabajo::all();
        $servicios= Servicio::all();
        return view('admin.gestionar_detalle_trabajo.registrar_detalle_trabajo', ['ordenes' => $ordenes,'servicios'=>$servicios]);
    }

    public function guardar(DetalleTrabajoStoreRequest $request){
        $detalle = new DetalleTrabajo($request->all());
        $detalle->save();
        Bitacora::tupla_bitacora('Registro al Detalle de trabajo:'.$detalle->id);//bitacora
        return redirect()->route('admin.detalle_trabajo.index');
    }

    public function editar($id_detalle_trabajo){
        Bitacora::tupla_bitacora('Entro al formulario para editar detalle de trabajo :'.$id_detalle_trabajo);//bitacora
        $detalle = DetalleTrabajo::findOrFail($id_detalle_trabajo);
        $ordenes= OrdenTrabajo::all();
        $servicios= Servicio::all();
        return View('admin.gestionar_detalle_trabajo.editar_detalle_trabajo', ['detalle' => $detalle,'ordenes' => $ordenes,'servicios'=> $servicios]);
    }

    public function modificar(Request $request,$id_detalle_trabajo){
        $detalle = DetalleTrabajo::findOrFail($id_detalle_trabajo);
        $detalle->id_ot = $request['id_ot'];
        $detalle->id_servicio = $request['id_servicio'];
        $detalle->precio = $request['precio'];
        $detalle->descripcion = $request['descripcion'];
        $detalle->save();
        Bitacora::tupla_bitacora('Se Modifico el Detalle de Trabajo:'.$detalle->id);//bitacora
        return redirect()->route('admin.detalle_trabajo.index');
    }

    public function eliminar($id_detalle_trabajo){
        $detalle = DetalleTrabajo::findOrFail($id_detalle_trabajo);
        Bitacora::tupla_bitacora('Se Ingreso al Formulario para Eliminar el detalle de trabajo :'.$id_detalle_trabajo);
        return View('admin.gestionar_detalle_trabajo.eliminar_detalle_trabajo', ['detalle' => $detalle]);
    }
    public function delete(Request $request,$id_detalle_trabajo){
        if($request['eliminar'] == 'ELIMINAR'){
            $detalle = DetalleTrabajo::findOrFail($id_detalle_trabajo);
            $detalle->delete();
            Bitacora::tupla_bitacora('Se Elimino el detalle de trabajo:'.$id_detalle_trabajo);//bitacora
            return redirect()->route('admin.detalle_trabajo.index');
        }
        return redirect()->route('admin.detalle_trabajo.eliminar', [$id_detalle_trabajo]);

    }
}
