<?php

namespace App\Http\Controllers;

use App\Personal;
use App\Trabajador;
use Illuminate\Http\Request;
use App\User;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;

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

        $user = new User();
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->id_personal = $persona->id;
        $user->save();


        foreach($request['id_permiso'] as $id)
        {
            DB::table('permission_user')->insert([
                'permission_id' => $id,
                'user_id' => $user->id,
            ]);
        }


        return redirect()->route('admin.trabajador.index');
    }

}
