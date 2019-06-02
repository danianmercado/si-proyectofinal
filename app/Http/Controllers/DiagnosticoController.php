<?php

namespace App\Http\Controllers;

use App\Diagnostico;
use App\Http\Requests\DiagnosticoStoreRequest;
use App\Recepcion;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{

    public function index(){
        $diagnosticos = Diagnostico::all();
        return view('admin.gestionar_diagnostico.index',['diagnosticos'=>$diagnosticos]);
    }

    public function show($id_diagnosticos){

    }
    public function registrar(){
        $recepciones = Recepcion::all();
        return view('admin.gestionar_diagnostico.registrar_diagnostico', ['recepciones' => $recepciones]);
    }

    public function guardar(DiagnosticoStoreRequest $request){
        $diagnostico=new Diagnostico($request->all());

        $diagnostico->save();
        return redirect()->route('admin.diagnostico.index');
    }

    public function editar($id_diagnostico){
        $diagnostico = Diagnostico::findOrFail($id_diagnostico);
        $recepciones = Recepcion::all();
        return View('admin.gestionar_diagnostico.editar_diagnostico', ['diagnostico' => $diagnostico,'recepciones' => $recepciones]);
    }

    public function modificar(Request $request,$id_diagnostico){
        $diagnostico = Diagnostico::findOrFail($id_diagnostico);
        $diagnostico->descripcion = $request['descripcion'];
        $diagnostico->id_recepcion = $request['id_recepcion'];
        $diagnostico->save();
        return redirect()->route('admin.diagnostico.index');
    }

    public function eliminar($id_diagnostico){
        $diagnostico = Diagnostico::findOrFail($id_diagnostico);
        return View('admin.gestionar_diagnostico.eliminar_diagnostico', ['diagnostico' => $diagnostico]);
    }
    public function delete(Request $request,$id_diagnostico){
        if($request['eliminar'] == 'ELIMINAR'){
            $diagnostico = Diagnostico::findOrFail($id_diagnostico);
            $diagnostico->delete();
            return redirect()->route('admin.diagnostico.index');
        }
        return redirect()->route('admin.diagnostico.eliminar', [$id_diagnostico]);

    }
}
