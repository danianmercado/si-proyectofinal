<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrdenTrabajoStoreRequest;
use App\OrdenTrabajo;
use App\Personal;
use App\Recepcion;
use App\Trabajador;
use App\Bitacora;
use Illuminate\Http\Request;

class OrdenTrabajoController extends Controller
{

    public function index()
    {
        $ordenes = OrdenTrabajo::all();
        return view('admin.gestionar_orden_trabajo.index', ['ordenes'=>$ordenes]);
    }

    public function show($id_orden)
    {
        $orden = OrdenTrabajo::findOrFail($id_orden);
        return view('admin.gestionar_orden_trabajo.detalle_orden_trabajo', ['orden'=>$orden]);
    }

    public function registrar()
    {
        $recepciones = Recepcion::all();
        $trabajadores = Trabajador::all();
        return view('admin.gestionar_orden_trabajo.registrar_orden_trabajo', ['recepciones'=>$recepciones, 'trabajadores'=>$trabajadores]);
    }


    public function guardar(OrdenTrabajoStoreRequest $request)
    {
        $orden = new OrdenTrabajo($request->all());
        $orden->save();
        return redirect()->route('admin.orden_trabajo.index');
    }

    public function editar($id_orden_trabajo){
        Bitacora::tupla_bitacora('Entro al formulario para editar orden de trabajo :'.$id_orden_trabajo);//bitacora
        $ordenes = OrdenTrabajo::findOrFail($id_orden_trabajo);
        $recepciones= Recepcion::all();
        $trabajadores =Trabajador::all();
        return View('admin.gestionar_orden_trabajo.editar_orden_trabajo', ['orden' => $ordenes,'recepciones' => $recepciones,'trabajadores'=> $trabajadores]);
    }

    public function modificar(Request $request,$id_orden_trabajo){
        $orden = OrdenTrabajo::findOrFail($id_orden_trabajo);
        $orden->tiempo_estimado = $request['tiempo_estimado'];
        $orden->id_trabajador = $request['id_trabajador'];
        $orden->id_recepcion = $request['id_recepcion'];
        $orden->save();
        Bitacora::tupla_bitacora('Se Modifico la orden de trabajo:'.$orden->id);//bitacora
        return redirect()->route('admin.orden_trabajo.index');
    }
    public function eliminar($id_orden_trabajo){
        $orden = OrdenTrabajo::findOrFail($id_orden_trabajo);
        Bitacora::tupla_bitacora('Se Ingreso al Formulario para Eliminar el orden de trabajo :'.$id_orden_trabajo);
        return View('admin.gestionar_orden_trabajo.eliminar_orden_trabajo', ['orden' => $orden]);
    }
    public function delete(Request $request,$id_orden_trabajo){
        if($request['eliminar'] == 'ELIMINAR'){
            DB::table('detalle_trabajo')
                ->where('id_ot', '=', $id_orden_trabajo)
                ->delete();
            $orden = OrdenTrabajo::findOrFail($id_orden_trabajo);
            $orden->delete();
            Bitacora::tupla_bitacora('Se Elimino la orden de trabajo :'.$id_orden_trabajo);
            return redirect()->route('admin.orden_trabajo.index');
        }
        return redirect()->route('admin.orden_trabajo.eliminar', [$id_orden_trabajo]);

    }
}
