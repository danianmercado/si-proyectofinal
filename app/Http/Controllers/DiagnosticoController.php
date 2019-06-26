<?php

namespace App\Http\Controllers;

use App\Diagnostico;
use App\Http\Requests\DiagnosticoStoreRequest;
use App\Recepcion;
use Illuminate\Http\Request;
use App\Bitacora;

class DiagnosticoController extends Controller
{

    public function index(){
        Bitacora::tupla_bitacora('Listar Diagnostico');// bitacora
        $diagnosticos = Diagnostico::all();
        return view('admin.gestionar_diagnostico.index',['diagnosticos'=>$diagnosticos]);
    }

    public function show($id_diagnostico){
      Bitacora::tupla_bitacora('Mostrar el diagnostico :'.$id_diagnostico);//bitacora
        $diagnostico = Diagnostico::findOrFail($id_diagnostico);
        return View('admin.gestionar_diagnostico.detalle_diagnostico', ['diagnostico' => $diagnostico]);

    }
    public function registrar(){
        Bitacora::tupla_bitacora('Entro al formulario de registro de diagnostico');//bitaacora
        $recepciones = Recepcion::all();
        return view('admin.gestionar_diagnostico.registrar_diagnostico', ['recepciones' => $recepciones]);
    }

    public function guardar(DiagnosticoStoreRequest $request){
        $diagnostico=new Diagnostico($request->all());
        $diagnostico->save();
        Bitacora::tupla_bitacora('Registro el diagnostico :'.$diagnostico->id);//bitacora
        return redirect()->route('admin.diagnostico.index');
    }

    public function editar($id_diagnostico){
        Bitacora::tupla_bitacora('Entro al formulario para editar diagnostico :'.$id_diagnostico);//bitacora
        $diagnostico = Diagnostico::findOrFail($id_diagnostico);
        $recepciones = Recepcion::all();
        return View('admin.gestionar_diagnostico.editar_diagnostico', ['diagnostico' => $diagnostico,'recepciones' => $recepciones]);
    }

    public function modificar(Request $request,$id_diagnostico){
        $diagnostico = Diagnostico::findOrFail($id_diagnostico);
        $diagnostico->descripcion = $request['descripcion'];
        $diagnostico->id_recepcion = $request['id_recepcion'];
        $diagnostico->save();
        Bitacora::tupla_bitacora('Se Modifico el diagnostico:'.$diagnostico->id);//bitacora
        return redirect()->route('admin.diagnostico.index');
    }

    public function eliminar($id_diagnostico){
        $diagnostico = Diagnostico::findOrFail($id_diagnostico);
          Bitacora::tupla_bitacora('Se Ingreso al Formulario para Eliminar el diagnostico :'.$id_diagnostico);//bitacora
        return View('admin.gestionar_diagnostico.eliminar_diagnostico', ['diagnostico' => $diagnostico]);
    }
    public function delete(Request $request,$id_diagnostico){
        if($request['eliminar'] == 'ELIMINAR'){
            $diagnostico = Diagnostico::findOrFail($id_diagnostico);
            $diagnostico->delete();
            Bitacora::tupla_bitacora('Se Elimino el diagnostico:'.$id_diagnostico);//bitacora
            return redirect()->route('admin.diagnostico.index');
        }
        return redirect()->route('admin.diagnostico.eliminar', [$id_diagnostico]);

    }
}
