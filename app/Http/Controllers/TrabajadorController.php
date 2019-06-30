<?php

namespace App\Http\Controllers;

use App\Personal;
use App\Trabajador;
use Illuminate\Http\Request;
use App\User;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Facades\DB;

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
        $roles = Role::all();
        return view('admin.gestionar_trabajador.registrar_trabajador',['roles'=>$roles]);
    }

    public function guardar(Request $request)
    {
        $persona = new Personal($request->all());
        $persona->save();

        $trabajador = new Trabajador();
        $trabajador->especialidad = $request['especialidad'];
        $trabajador->id = $request['id'];
        $trabajador->id_personal = $persona->id;
        $trabajador->save();



        return redirect()->route('admin.trabajador.index');
    }

    public function editar($id)
    {
        $trabajador = Trabajador::findOrFail($id);
        return view('admin.gestionar_trabajador.editar_trabajador', ['trabajador'=>$trabajador]);
    }

    public function modificar(Request $request, $id)
    {
        $trabajador = Trabajador::findOrFail($id);
        $trabajador->especialidad = $request['especialidad'];

        $personal = $trabajador->personal;
        $personal->ci = $request['ci'];
        $personal->nombre = $request['nombre'];
        $personal->paterno = $request['paterno'];
        $personal->materno = $request['materno'];
        $personal->direccion = $request['direccion'];
        $personal->fecha_nacimiento = $request['fecha_nacimiento'];
        $personal->telefono = $request['telefono'];
        $personal->save();

        $trabajador->save();

        return redirect()->route('admin.trabajador.index');
    }

}
