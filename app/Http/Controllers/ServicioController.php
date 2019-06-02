<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicioStoreRequest;
use App\Servicio;

class ServicioController extends Controller
{

    public function index(){
        $servicios = Servicio::all();
        return view('admin.gestionar_servicio.index',['servicios'=>$servicios]);
    }

    public function show($id_servicio){

    }
    public function registrar(){
        $servicios = Servicio::all();
        return view('admin.gestionar_servicio.registrar_servicio', ['servicios' => $servicios]);
    }

    /**
     * @param ServicioStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function guardar(ServicioStoreRequest $request){
        $servicio = new Servicio($request->all());
        $servicio->save();
        return redirect()->route('admin.servicio.index');
    }

    public function editar($id_servicio){
        $servicio = Servicio::findOrFail($id_servicio);
        return View('admin.gestionar_servicio.editar', ['servicio' => $servicio]);
    }

    public function modificar(Request $request,$id_servicio){

    }

    public function eliminar($id_servicio){

    }
    public function delete(Request $request,$id_servicio){

    }
}
