<?php

namespace App\Http\Controllers;

use App\Servicio_Tercerizado;
use App\Http\Requests\ServicioTercerizadoStoreRequest;
use Illuminate\Http\Request;

class ServicioTercerizadoController extends Controller
{

    public function index(){
        $servicios_tercerizados = Servicio_Tercerizado::all();
        return view('admin.gestionar_servicios_tercerizados.index',['servicios_tercerizados'=>$servicios_tercerizados]);
    }

    public function show($id_servicios_tercerizados){

        $servicios_tercerizados =  Servicio_Tercerizado::findOrFail($id_servicios_tercerizados);
        return View('admin.gestionar_servicio.detalle_servicio', ['servicios_tercerizados' => $servicios_tercerizados]);
    }
    public function registrar(){
        $servicios_tercerizados =  Servicio_Tercerizado::all();
        return view('admin.gestionar_servicios_tercerizados.registrar_servicio_tercerizado', ['servicios_tercerizados' => $servicios_tercerizados]);
    }


    public function guardar(ServicioTercerizadoStoreRequest $request){
        $servicio_tercerizado = new  Servicio_Tercerizado($request->all());
        $servicio_tercerizado->save();
        return redirect()->route('admin.servicio_tercerizado.index');
    }

    public function editar($id_servicio_tercerizado){
        $servicio_tercerizado = Servicio_Tercerizado::findOrFail($id_servicio_tercerizado);
        return View('admin.gestionar_servicios_tercerizados.editar_servicio_tercerizado', ['servicio_tercerizado' => $servicio_tercerizado]);
    }

    public function modificar(Request $request,$id_servicio_tercerizado){
        $servicio_tercerizado = Servicio_Tercerizado::findOrFail($id_servicio_tercerizado);
        $servicio_tercerizado->Contacto = $request['Contacto'];
        $servicio_tercerizado->Ubicacion = $request['Ubicacion'];
        $servicio_tercerizado->telefono = $request['telefono'];
        $servicio_tercerizado->save();
        return redirect()->route('admin.servicio_tercerizado.index');

    }

    public function eliminar($id_servicio_tercerizado){

    }
    public function delete(Request $request,$id_servicio_tercerizado){

    }
}
