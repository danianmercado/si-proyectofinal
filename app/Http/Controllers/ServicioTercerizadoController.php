<?php

namespace App\Http\Controllers;

use App\Servicio_Tercerizado;
use App\Http\Requests\ServicioTercerizadoStoreRequest;

class ServicioTercerizadoController extends Controller
{

    public function index(){
        $servicios_Tercerizados = Servicio_Tercerizado::all();
        return view('admin.gestionar_servicios_tercerizados.index',['servicios_tercerizados'=>$servicios_Tercerizados]);
    }

    public function show($id_servicios_Tercerizados){

    }
    public function registrar(){
        $servicios_Tercerizados = Servicio_Tercerizado::all();
        return view('admin.gestionar_servicios_tercerizados.registrar_servicios_tercerizados', ['servicios_tercerizados' => $servicios_Tercerizados]);
    }

    /**

     */
    public function guardar(ServicioTercerizadoStoreRequest $request){
        $servicio_Tercerizado = new Servicio_Tercerizado($request->all());
        $servicio_Tercerizado->save();
        return redirect()->route('admin.servicio_tercerizado.index');
    }

    public function editar($id_servicio_Tercerizado){
        $servicio_Tercerizado = Servicio_Tercerizado::findOrFail($id_servicio_Tercerizado);
        return View('admin.gestionar_servicio_tercerizados.editar', ['servicio' => $servicio_Tercerizado]);
    }

    public function modificar(Request $request,$id_servicio_Tercerizado){

    }

    public function eliminar($id_servicio_Tercerizado){

    }
    public function delete(Request $request,$id_servicio_Tercerizado){

    }
}
