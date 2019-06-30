<?php

namespace App\Http\Controllers;

use App\DetalleServicio;
use App\Http\Requests\ServicioStoreRequest;
use App\Servicio;
use Illuminate\Http\Request;


class ServicioController extends Controller
{

    public function index(){
        $servicios = Servicio::all();
        return view('admin.gestionar_servicio.index',['servicios'=>$servicios]);
    }

    public function show($id_servicio){
        $servicio = Servicio::findOrFail($id_servicio);
        $detalle_servicios = DetalleServicio::all();
        return View('admin.gestionar_servicio.detalle_servicio', ['servicio' => $servicio,'detalle_servicios'=>$detalle_servicios]);
    }
    public function registrar(){
        $servicios = Servicio::all();
        return view('admin.gestionar_servicio.registrar_servicio', ['servicios' => $servicios]);
    }


    public function guardar(ServicioStoreRequest $request){
        $servicio = new Servicio($request->all());
        $servicio->save();
        return redirect()->route('admin.servicio.index');
    }

    public function editar($id_servicio){
        $servicio = Servicio::findOrFail($id_servicio);
        return View('admin.gestionar_servicio.editar_servicio', ['servicio' => $servicio]);
    }

    public function modificar(Request $request,$id_servicio){
        $servicio = Servicio::findOrFail($id_servicio);
        $servicio->Tipo_de_Servicio = $request['Tipo_de_Servicio'];
        $servicio->Estado = $request['Estado'];
        $servicio->save();
        return redirect()->route('admin.servicio.index');

    }

    public function eliminar($id_servicio){
        $servicio = Servicio::findOrFail($id_servicio);
        return View('admin.gestionar_servicio.eliminar_servicio', ['servicio' => $servicio]);
    }
    public function delete(Request $request,$id_servicio){
        if($request['eliminar'] == 'ELIMINAR'){
            $servicio = Servicio::findOrFail($id_servicio);
            $servicio->delete();
            return redirect()->route('admin.servicio.index');
        }
        return redirect()->route('admin.servicio.eliminar', [$id_servicio]);

    }
}
