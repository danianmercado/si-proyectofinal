<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RepuestoStoreRequest;
use App\Repuesto;
use Illuminate\Support\Facades\DB;

class RepuestoController extends Controller
{
    public function index(){
        $repuestos=Repuesto::all();
        return view('admin.gestionar_repuesto.index',['repuestos'=>$repuestos]);
    }

    public function show($id_repuesto){
        $repuesto = Repuesto::findOrFail($id_repuesto);
        return View('admin.gestionar_repuesto.detalle_repuesto', ['repuesto' => $repuesto]);

    }
    public function registrar(){
        return view('admin.gestionar_repuesto.registrar_repuesto');
    }

    public function guardar(RepuestoStoreRequest $request){
        $repuesto=new Repuesto($request->all());
        $repuesto->Tipo_producto='R';
        $repuesto->save();
        return redirect()->route('admin.repuesto.index');
    }

    public function editar($id_repuesto){
        $repuesto = Repuesto::findOrFail($id_repuesto);
        return View('admin.gestionar_repuesto.editar_repuesto', ['repuesto' => $repuesto]);
    }

    public function modificar(Request $request,$id_repuesto){
        $repuesto = Repuesto::findOrFail($id_repuesto);
        $repuesto->Nombre = $request['Nombre'];
        $repuesto->procedencia = $request['procedencia'];
        $repuesto->descripcion = $request['descripcion'];
        $repuesto->costo = $request['Costo'];
        $repuesto->save();
        return redirect()->route('admin.repuesto.index');
    }

    public function eliminar($id_repuesto){
        $repuesto = Repuesto::findOrFail($id_repuesto);
        return View('admin.gestionar_repuesto.eliminar_repuesto', ['repuesto' => $repuesto]);
    }
    public function delete(Request $request,$id_repuesto){
        if($request['eliminar'] == 'ELIMINAR'){
            DB::table('producto')
                ->where('id', '=', $id_repuesto)
                ->delete();
           
            return redirect()->route('admin.repuesto.index');
        }
        return redirect()->route('admin.repuesto.eliminar', [$id_repuesto]);
    }
}
