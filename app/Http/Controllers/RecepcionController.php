<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecepcionStoreRequest;
use App\Recepcion;
use App\Vehiculo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RecepcionController extends Controller
{

    public function index(){
        $recepciones = Recepcion::all();
        return view('admin.gestionar_recepcion.index',['recepciones'=>$recepciones]);
    }

    public function show($id_recepcion){
        $recepcion = Recepcion::findOrFail($id_recepcion);
        return View('admin.gestionar_recepcion.detalle_recepcion', ['recepcion' => $recepcion]);

    }
    public function registrar(){
        $vehiculos = Vehiculo::all();
        return view('admin.gestionar_recepcion.registrar_recepcion', ['vehiculos' => $vehiculos]);
    }

    public function guardar(RecepcionStoreRequest $request){
        $recepcion=new Recepcion($request->all());
        $recepcion->id_personal = auth()->user()->personal->id;
        $recepcion->save();
        return redirect()->route('admin.recepcion.index');
    }

    public function editar($id_recepcion){
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
        return redirect()->route('admin.recepcion.index');
    }

    public function eliminar($id_recepcion){
        $recepcion = Recepcion::findOrFail($id_recepcion);
        return View('admin.gestionar_recepcion.eliminar_recepcion', ['recepcion' => $recepcion]);
    }
    public function delete(Request $request,$id_recepcion){
        if($request['eliminar'] == 'ELIMINAR'){
            DB::table('diagnostico')
                ->where('id_recepcion', '=', $id_recepcion)
                ->delete();
            $recepcion = Recepcion::findOrFail($id_recepcion);
            $recepcion->delete();
            return redirect()->route('admin.recepcion.index');
        }
        return redirect()->route('admin.recepcion.eliminar', [$id_recepcion]);

    }
}
