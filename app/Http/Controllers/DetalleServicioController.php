<?php

namespace App\Http\Controllers;

use App\Bitacora;
use App\DetalleServicio;
use App\Http\Requests\DetalleTrabajoStoreRequest;
use App\Servicio;
use Illuminate\Http\Request;

class DetalleServicioController extends Controller
{
    public function show($id_servicio, $id_detalle){
        Bitacora::tupla_bitacora('Mostrar el detalle de servicio :'.$id_servicio.$id_detalle);//bitacora
        $servicio = Servicio::findOrFail($id_servicio);
        return View('admin.gestionar_servicio.detalle_servicio', ['servicio' => $servicio]);

    }

    public function registrar($id_servicio){
        Bitacora::tupla_bitacora('Entro al formulario de registro del detalle de servicio');//bitaacora
        $servicio = Servicio::findOrFail($id_servicio);
        return view('admin.gestionar_servicio.registrar_detalle_servicio', ['servicio' => $servicio]);
    }

    public function guardar(DetalleTrabajoStoreRequest $request,$id_servicio){

        $servicio = Servicio::findOrFail($id_servicio);
        $detalle = new DetalleServicio ($request->all());
        $detalle->id_servicio = $id_servicio;
        $detalle->save();
        Bitacora::tupla_bitacora('Registro el detalle de servicio:'.$servicio->id);//bitacora
        return redirect()->route('admin.servicio.show',[$servicio->id]);
    }

    public function editar($id_servicio, $id_detalle){
        Bitacora::tupla_bitacora('Entro al formulario para editar servicio :'.$id_detalle);//bitacora
        $servicio = Servicio::findOrFail($id_servicio);
        $detalle =DetalleServicio::findOrFail($id_detalle);
        return View('admin.gestionar_servicio.editar_detalle_servicio', ['servicio' => $servicio,'detalle' => $detalle]);
    }

    public function modificar(Request $request, $id_servicio, $id_detalle){
        $servicio = Servicio::findOrFail($id_servicio);
        $detalle =DetalleServicio::findOrFail($id_detalle);
        $detalle->descripcion=$request['descripcion'];
        $detalle->save();
        Bitacora::tupla_bitacora('Se Modifico el detalle de servicio:'.$detalle->id);//bitacora
        return redirect()->route('admin.servicio.show',[$servicio->id]);
    }
     public function eliminar($id_servicio, $id_detalle){
         $servicio = Servicio::findOrFail($id_servicio);
         $detalle =DetalleServicio::findOrFail($id_detalle);
         return view('admin.gestionar_servicio.eliminar_detalle_servicio',['servicio'=>$servicio,'detalle'=>$detalle]);
     }

    public function delete(Request $request, $id_servicio, $id_detalle){
        $servicio = Servicio::findOrFail($id_servicio);
        $detalle =DetalleServicio::findOrFail($id_detalle);
        if($request['eliminar'] == 'ELIMINAR'){
            $detalle->delete();
            return redirect()->route('admin.servicio.show',[$servicio->id]);
        }
        return redirect()->route('admin.detalle_servicio.eliminar', [$id_servicio,$id_detalle]);

    }
}
