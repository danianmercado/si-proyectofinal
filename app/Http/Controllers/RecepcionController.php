<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecepcionStoreRequest;
use App\Recepcion;
use App\Vehiculo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Bitacora;

class RecepcionController extends Controller
{

    public function index(){
      Bitacora::tupla_bitacora('Listar Recepciones');//llama a la funcion tupla_bitacora de la class bitacora
        $recepciones = Recepcion::all();
        return view('admin.gestionar_recepcion.index',['recepciones'=>$recepciones]);
    }

    public function show($id_recepcion){
        Bitacora::tupla_bitacora('Mostrar la recepcion :'.$id_recepcion);//llama a la funcion tupla_bitacora de la class bitacora
        $recepcion = Recepcion::findOrFail($id_recepcion);
        return View('admin.gestionar_recepcion.detalle_recepcion', ['recepcion' => $recepcion]);

    }
    public function registrar(){
        Bitacora::tupla_bitacora('Entro al formulario de registro de Recepcion');
        $vehiculos = Vehiculo::all();
        return view('admin.gestionar_recepcion.registrar_recepcion', ['vehiculos' => $vehiculos]);
    }

    public function guardar(RecepcionStoreRequest $request){
        $recepcion=new Recepcion($request->all());
        $recepcion->id_personal = auth()->user()->personal->id;
        $recepcion->save();
        Bitacora::tupla_bitacora('Registro la recepcion :'.$recepcion->id);
        return redirect()->route('admin.recepcion.index');
    }

    public function editar($id_recepcion){
        Bitacora::tupla_bitacora('Entro al formulario de edicion de recepcion de la recepcion :'.$id_recepcion);
        $recepcion = Recepcion::findOrFail($id_recepcion);
        $vehiculos = Vehiculo::all();
        return View('admin.gestionar_recepcion.editar_recepcion', ['recepcion' => $recepcion,'vehiculos' => $vehiculos]);
    }

    public function modificar(Request $request,$id_recepcion){
        $recepcion = Recepcion::findOrFail($id_recepcion);
        $recepcion->id_vehiculo = $request['id_vehiculo'];
        $recepcion->estado = $request['estado'];
        $recepcion->fecha_ingreso = $request['fecha_ingreso'];
        $recepcion->save();
        Bitacora::tupla_bitacora('Se Modifico la recepcion :'.$recepcion->id);
        return redirect()->route('admin.recepcion.index');
    }

    public function eliminar($id_recepcion){
        $recepcion = Recepcion::findOrFail($id_recepcion);
        Bitacora::tupla_bitacora('Se Ingreso al Formulario para Eliminar la recepcion :'.$id_recepcion);
        return View('admin.gestionar_recepcion.eliminar_recepcion', ['recepcion' => $recepcion]);
    }
    public function delete(Request $request,$id_recepcion){
        if($request['eliminar'] == 'ELIMINAR'){
            DB::table('diagnostico')
                ->where('id_recepcion', '=', $id_recepcion)
                ->delete();
            $recepcion = Recepcion::findOrFail($id_recepcion);
            $recepcion->delete();
            Bitacora::tupla_bitacora('Se Elimino la recepcion :'.$id_recepcion);
            return redirect()->route('admin.recepcion.index');
        }
        return redirect()->route('admin.recepcion.eliminar', [$id_recepcion]);

    }
}
