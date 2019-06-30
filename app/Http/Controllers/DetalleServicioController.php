<?php

namespace App\Http\Controllers;

use App\Bitacora;
use App\DetalleServicio;
use App\Http\Requests\DetalleTrabajoStoreRequest;
use App\Servicio;
use Illuminate\Http\Request;

class DetalleServicioController extends Controller
{
    public function index(){
        Bitacora::tupla_bitacora('Listar detalle de servicio');// bitacora
        $detalle_servicios = DetalleServicio::all();
        return view('admin.gestionar_servicio.index',['detalle_servicios'=>$detalle_servicios]);
    }

    public function show($id_detalle_servicio){
        Bitacora::tupla_bitacora('Mostrar el detalle de servicio :'.$id_detalle_servicio);//bitacora
        $detalle_servicio = DetalleServicio::findOrFail($id_detalle_servicio);
        return View('admin.gestionar_servicio.detalle_servicio', ['detalle_servicios' => $detalle_servicio]);

    }
    public function registrar(){
        Bitacora::tupla_bitacora('Entro al formulario de registro de detalle de servicio');//bitaacora
        $servicios = Servicio::all();
        return view('admin.gestionar_servicio.registrar_detalle_servicio', ['detalle_servicios' => $servicios]);
    }

    public function guardar(DetalleTrabajoStoreRequest $request){
        $detalle_servicio=new DetalleServicio($request->all());
        $detalle_servicio->save();
        Bitacora::tupla_bitacora('Registro el detalle de servicio :'.$detalle_servicio->id);//bitacora
        return redirect()->route('admin.detalle_servicio.index');
    }

    public function editar($id_detalle_servicio){
        Bitacora::tupla_bitacora('Entro al formulario para editar el detalle de servicio :'.$id_detalle_servicio);//bitacora
        $detalle_servicio = DetalleServicio::findOrFail($id_detalle_servicio);
        $servicio = Servicio::all();
        return View('admin.gestionar_diagnostico.editar_diagnostico', ['detalle_servicio' => $detalle_servicio,'servicios' => $servicio]);
    }

    public function modificar(Request $request,$id_detalle_servicio){
        $detalle_servicio = DetalleServicio::findOrFail($id_detalle_servicio);
        $detalle_servicio->descripcion = $request['descripcion'];
        $detalle_servicio->id_servicio= $request['id_servicio'];
        $detalle_servicio->save();
        Bitacora::tupla_bitacora('Se Modifico el detalle de servicio:'.$detalle_servicio->id);//bitacora
        return redirect()->route('admin.detalle_servicio.index');
    }
}
