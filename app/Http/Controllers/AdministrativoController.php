<?php

namespace App\Http\Controllers;

use App\Personal;
use App\Administrativo;
use Illuminate\Http\Request;

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
        return view('admin.gestionar_administrativo.registrar_administrativo');
    }

    public function guardar(Request $request)
    {
        $persona = new Personal($request->all());
        $persona->save();

        $administrativo = new Administrativo();
        $administrativo->area = $request['area'];
        $administrativo->id = $request['id'];
        $administrativo->save();

        return redirect()->route('admin.administrativo.index');
    }

}
