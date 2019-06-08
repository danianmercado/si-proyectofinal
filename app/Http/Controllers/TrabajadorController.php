<?php

namespace App\Http\Controllers;

use App\Personal;
use App\Trabajador;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    public function index(){
        $trabajadores = Trabajador::all();
        return view('admin.gestionar_trabajador.index', ['trabajadores'=>$trabajadores]);
    }

    public function show($id_trabajador)
    {
        $trabajador = Trabajador::findOrFail($id_trabajador);
        return view('admin.gestionar_trabajador.detalle_trabajador', ['trabajador'=>$trabajador]);
    }
    public function registrar(){
        return view('admin.gestionar_trabajador.registrar_trabajador');
    }

    public function guardar(Request $request)
    {
        $persona = new Personal($request->all());
        $persona->save();

        $trabajador = new Trabajador();
        $trabajador->especialidad = $request['especialidad'];
        $trabajador->id = $request['id'];
        $trabajador->save();

        return redirect()->route('admin.trabajador.index');
    }

}
