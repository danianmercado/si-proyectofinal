<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HerramientaStoreRequest;
use App\Herramienta;
use Illuminate\Support\Facades\DB;

class HerramientaController extends Controller
{
    public function index(){
        $herramientas=Herramienta::all();
        return view('admin.gestionar_herramienta.index',['herramientas'=>$herramientas]);
    }

    public function show($id_herramienta){
        $herramienta = Herramienta::findOrFail($id_herramienta);
        return View('admin.gestionar_herramienta.detalle_herramienta', ['herramienta' => $herramienta]);

    }
    public function registrar(){
        return view('admin.gestionar_herramienta.registrar_herramienta');
    }

    public function guardar(HerramientaStoreRequest $request){
        $herramienta=new Herramienta($request->all());
        $herramienta->save();
        return redirect()->route('admin.herramienta.index');
    }

    public function editar($id_herramienta){
        $herramienta = Herramienta::findOrFail($id_herramienta);
        return View('admin.gestionar_herramienta.editar_herramienta', ['herramienta' => $herramienta]);
    }

    public function modificar(Request $request,$id_herramienta){
        $herramienta = Herramienta::findOrFail($id_herramienta);
        $herramienta->Marca = $request['Marca'];
        $herramienta->Tipo = $request['Tipo'];
        $herramienta->Descripcion = $request['Descripcion'];
        $herramienta->save();
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
