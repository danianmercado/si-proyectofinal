<?php

namespace App\Http\Controllers;

use App\Bitacora;
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
        Bitacora::tupla_bitacora('Mostro la lista de administrtivos');//bitacora
        $administrativos = Administrativo::all();

        return view('admin.gestionar_administrativo.index', ['administrativos'=>$administrativos]);
    }

    public function show($id_administrativo){
        Bitacora::tupla_bitacora('Mostrar el Administratico :'.$id_administrativo);//bitacora
        $administrativo = Administrativo::findOrFail($id_administrativo);
        return view('admin.gestionar_administrativo.detalle_administrativo', ['administrativo'=>$administrativo]);
    }
    public function registrar(){
        Bitacora::tupla_bitacora('Entro al formulario de registro de administrador');//bitaacora
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
    {   Bitacora::tupla_bitacora('Entro al formulario para editar administrativo :'.$id);//bitacora
        $admin = Administrativo::findOrFail($id);
        return view('admin.gestionar_administrativo.editar_administrativo', ['admin'=>$admin]);
    }
    public function modificar(Request $request,$id){

        $admin = Administrativo::findOrFail($id);
        $admin->id_personal=$request['id_personal'];
        $admin->area = $request['area'];
        $admin->save();
        Bitacora::tupla_bitacora('Se Modifico el cliente:'.$id->id);//bitacora
        return redirect()->route('admin.administrativo.index');
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
