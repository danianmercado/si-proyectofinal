<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index(){
        $personales=Personal::all();
        return view('admin.gestionar_personal.index',['personales'=>$personales]);
    }

    public function show($id_personal){
        $personal = Personal::findOrFail($id_personal);
        return View('admin.gestionar_personal.detalle_personal', ['personal' => $personal]);

    }
    public function registrar(){
        return view('admin.gestionar_personal.registrar_personal');
    }

    public function guardar(PersonalStoreRequest $request){
        $personal=new Personal($request->all());
        $personal->save();
        return redirect()->route('admin.personal.index');
    }

    public function editar($id_personal){
        $personal = Personal::findOrFail($id_personal);
        return View('admin.gestionar_personal.editar_personal', ['personal' => $personal]);
    }

    public function modificar(Request $request,$id_personal){
        $personal = Personal::findOrFail($id_personal);
        $personal->nombre = $request['nombre'];
        $personal->paterno = $request['paterno'];
        $personal->materno = $request['materno'];
        $personal->direccion = $request['direccion'];
        $personal->telefono = $request['telefono'];
        $personal->fecha_nacimiento = $request['fecha_nacimiento'];
        $personal->save();
        return redirect()->route('admin.personal.index');
    }

    public function eliminar($id_personal){
        $personal = Personal::findOrFail($id_personal);
        return View('admin.gestionar_personal.eliminar_personal', ['personal' => $personal]);
    }
    public function delete(Request $request,$id_personal){
        if($request['eliminar'] == 'ELIMINAR'){
            DB::table('personal')
                ->where('id_personal', '=', $id_personal)
                ->delete();
            $personal = Personal::findOrFail($id_personal);
            $personal->delete();
            return redirect()->route('admin.personal.index');
        }
        return redirect()->route('admin.personal.eliminar', [$id_personal]);
    }
}
