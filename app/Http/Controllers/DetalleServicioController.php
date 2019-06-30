<?php

namespace App\Http\Controllers;

use App\DetalleServicio;
use App\Http\Requests\DetalleTrabajoStoreRequest;
use App\Servicio;
use Illuminate\Http\Request;

class DetalleServicioController extends Controller
{
    public function show($id_servicio, $id_detalle){

        $servicio = Servicio::findOrFail($id_servicio);
        return View('admin.gestionar_servicio.detalle_servicio', ['servicio' => $servicio]);

    }

    public function registrar($id_servicio){
        $servicio = Servicio::findOrFail($id_servicio);
        return view('admin.gestionar_servicio.registrar_detalle_servicio', ['servicio' => $servicio]);
    }

    public function guardar(DetalleTrabajoStoreRequest $request,$id_servicio){

        $servicio = Servicio::findOrFail($id_servicio);

        return redirect()->route('admin.detalle_servicio.index');
    }

    public function editar($id_servicio, $id_detalle){
        $servicio = Servicio::findOrFail($id_servicio);
        return View('admin.gestionar_diagnostico.editar_servicio', ['servicios' => $servicio]);
    }

    public function modificar(Request $request, $id_servicio, $id_detalle){
        $servicio = Servicio::findOrFail($id_servicio);
        return redirect()->route('admin.detalle_servicio.index');
    }
     public function eliminar($id_servicio, $id_detalle){
         $servicio = Servicio::findOrFail($id_servicio);

     }

    public function delete(Request $request, $id_servicio, $id_detalle){
        $servicio = Servicio::findOrFail($id_servicio);
    }
}
