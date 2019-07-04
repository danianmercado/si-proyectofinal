<?php

namespace App\Http\Controllers;

use App\Bitacora;
use App\DetalleServicio;
use App\Http\Requests\ServicioStoreRequest;
use App\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ServicioController extends Controller
{

    public function index(){
        $servicios = Servicio::all();
        return view('admin.gestionar_servicio.index',['servicios'=>$servicios]);
    }

    public function show($id_servicio){
        Bitacora::tupla_bitacora('Mostrar el servicio :'.$id_servicio);//bitacora
        $servicio = Servicio::findOrFail($id_servicio);
        $detalle_servicios =DB::table('detalle_servicio')
            ->where('id_servicio', '=', $id_servicio)
            ->get();
        return View('admin.gestionar_servicio.detalle_servicio', ['servicio' => $servicio,'detalle_servicios'=>$detalle_servicios]);
    }
    public function registrar(){
        Bitacora::tupla_bitacora('Entro al formulario de registro de servicio');//bitaacora
        $servicios = Servicio::all();
        return view('admin.gestionar_servicio.registrar_servicio', ['servicios' => $servicios]);
    }


    public function guardar(ServicioStoreRequest $request){
        $servicio = new Servicio($request->all());
        $servicio->save();
        Bitacora::tupla_bitacora('Registro al servicio:'.$servicio->id);//bitacora
        return redirect()->route('admin.servicio.index');
    }

    public function editar($id_servicio){
        Bitacora::tupla_bitacora('Entro al formulario para editar servicio :'.$id_servicio);//bitacora
        $servicio = Servicio::findOrFail($id_servicio);
        return View('admin.gestionar_servicio.editar_servicio', ['servicio' => $servicio]);
    }

    public function modificar(Request $request,$id_servicio){
        $servicio = Servicio::findOrFail($id_servicio);
        $servicio->Tipo_de_Servicio = $request['Tipo_de_Servicio'];
        $servicio->Estado = $request['Estado'];
        $servicio->save();
        Bitacora::tupla_bitacora('Se Modifico el servicio:'.$servicio->id);//bitacora
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
