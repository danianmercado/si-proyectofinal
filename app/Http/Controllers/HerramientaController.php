<?php

namespace App\Http\Controllers;

use App\Bitacora;
use Illuminate\Http\Request;
use App\Http\Requests\HerramientaStoreRequest;
use App\Herramienta;
use Illuminate\Support\Facades\DB;

class HerramientaController extends Controller
{
    public function index(){
        Bitacora::tupla_bitacora('Mostro la lista de herramientas');//bitacora
        $herramientas=Herramienta::all();
        return view('admin.gestionar_herramienta.index',['herramientas'=>$herramientas]);
    }

    public function show($id_herramienta){
        Bitacora::tupla_bitacora('Mostrar la herramienta :'.$id_herramienta);//bitacora
        $herramienta = Herramienta::findOrFail($id_herramienta);
        return View('admin.gestionar_herramienta.detalle_herramienta', ['herramienta' => $herramienta]);

    }
    public function registrar(){
        Bitacora::tupla_bitacora('Entro al formulario de registro de herramienta');//bitaacora
        return view('admin.gestionar_herramienta.registrar_herramienta');
    }

    public function guardar(HerramientaStoreRequest $request){
        $herramienta=new Herramienta($request->all());
        $herramienta->save();
        Bitacora::tupla_bitacora('Registro la herramienta:'.$herramienta->id);//bitacora
        return redirect()->route('admin.herramienta.index');
    }

    public function editar($id_herramienta){
          Bitacora::tupla_bitacora('Entro al formulario para editar herramienta :'.$id_herramienta);//bitacora
        $herramienta = Herramienta::findOrFail($id_herramienta);
        return View('admin.gestionar_herramienta.editar_herramienta', ['herramienta' => $herramienta]);
    }

    public function modificar(Request $request,$id_herramienta){
        $herramienta = Herramienta::findOrFail($id_herramienta);
        $herramienta->Marca = $request['Marca'];
        $herramienta->Tipo = $request['Tipo'];
        $herramienta->Descripcion = $request['Descripcion'];
        $herramienta->save();
        Bitacora::tupla_bitacora('Se Modifico la herramienta:'.$herramienta->id);//bitacora
        return redirect()->route('admin.herramienta.index');
    }

    public function eliminar($id_herramienta){
        $herramienta = Herramienta::findOrFail($id_herramienta);
        return View('admin.gestionar_herramienta.eliminar_herramienta', ['herramienta' => $herramienta]);
    }
    public function delete(Request $request,$id_herramienta){
        if($request['eliminar'] == 'ELIMINAR'){
            DB::table('herramienta')
                ->where('id', '=', $id_herramienta)
                ->delete();
           
            return redirect()->route('admin.herramienta.index');
        }
        return redirect()->route('admin.herramienta.eliminar', [$id_herramienta]);
    }
}
