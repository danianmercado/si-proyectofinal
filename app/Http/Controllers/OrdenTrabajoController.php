<?php

namespace App\Http\Controllers;

use App\OrdenTrabajo;
use App\Recepcion;
use App\Trabajador;
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
        return view('admin.gestionar_orden_trabajo.detalle_orden', ['orden'=>$orden]);
    }

    public function registrar()
    {
        $recepciones = Recepcion::all();
        $trabajadores = Trabajador::all();
        return view('admin.gestionar_orden_trabajo.registrar_orden', ['recepciones'=>$recepciones, 'trabajadores'=>$trabajadores]);
    }

    public function guardar(Request $request)
    {
        $orden = new OrdenTrabajo($request->all());
        $orden->save();
        return redirect()->route('admin.orden_trabajo.index');
    }

}
