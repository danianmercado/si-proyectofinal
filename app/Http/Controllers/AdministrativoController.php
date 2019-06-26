<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdministrativoStoreRequest;
use App\Personal;
use App\Administrativo;
use App\User;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministrativoController extends Controller
{
    public function index(){
        $administrativos = Administrativo::all();

        return view('admin.gestionar_administrativo.index', ['administrativos'=>$administrativos]);
    }

    public function show($id_administrativo)
    {
        $administrativo = Administrativo::findOrFail($id_administrativo);
        return view('admin.gestionar_administrativo.detalle_administrativo', ['administrativo'=>$administrativo]);
    }
    public function registrar(){
        $roles = Role::all();
        return view('admin.gestionar_administrativo.registrar_administrativo', ['roles'=>$roles]);
    }

    public function guardar(AdministrativoStoreRequest $request)
    {
        $persona = new Personal($request->all());
        $persona->save();

        $administrativo = new Administrativo();
        $administrativo->area = $request['area'];
        $administrativo->id = $request['id'];
        $administrativo->id_personal = $persona->id;
        $administrativo->save();

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

        return redirect()->route('admin.administrativo.index');
    }

    public function editar($id)
    {
        $admin = Administrativo::findOrFail($id);
        return view('admin.gestionar_trabajador.editar_trabajador', ['admin'=>$admin]);
    }


    public function eliminar($id)
    {
        $admin = Administrativo::findOrFail($id);
        return view('admin.gestionar_administrativo.eliminar_administrativo', ['admin'=>$admin]);
    }

    public function delete(Request $request, $id)
    {
        if($request['eliminar'] == 'INACTIVO'){
            $admin = Administrativo::findOrFail($id);
            DB::table('role_user')
                ->where('user_id', '=', $admin->personal->user->id)
                ->update(['role_id'=>2]);
            return redirect()->route('admin.administrativo.index');
        }
        return redirect()->route('admin.administrativo.eliminar', [$id]);
    }

}
