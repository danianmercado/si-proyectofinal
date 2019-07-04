<?php

namespace App\Http\Controllers;

use App\Bitacora;
use Illuminate\Http\Request;
use App\Http\Requests\InsumoStoreRequest;
use App\Insumo;
use Illuminate\Support\Facades\DB;

class InsumoController extends Controller
{
    public function index(){
        Bitacora::tupla_bitacora('Mostro la lista de insumos');//bitacora
        $insumos=Insumo::all();
        return view('admin.gestionar_insumo.index',['insumos'=>$insumos]);
    }

    public function show($id_insumo){
        Bitacora::tupla_bitacora('Mostrar el insumo :'.$id_insumo);//bitacora
        $insumo = Insumo::findOrFail($id_insumo);
        return View('admin.gestionar_insumo.detalle_insumo', ['insumo' => $insumo]);

    }
    public function registrar(){
        Bitacora::tupla_bitacora('Entro al formulario de registro de insumo');//bitaacora
        return view('admin.gestionar_insumo.registrar_insumo');
    }

    public function guardar(InsumoStoreRequest $request){
        $insumo=new Insumo($request->all());
        $insumo->Tipo_producto='I';
        $insumo->save();
        Bitacora::tupla_bitacora('Registro el insumo:'.$insumo->id);//bitacora
        return redirect()->route('admin.insumo.index');
    }

    public function editar($id_insumo){
        Bitacora::tupla_bitacora('Entro al formulario para editar insumo :'.$id_insumo);//bitacora
        $insumo = Insumo::findOrFail($id_insumo);
        return View('admin.gestionar_insumo.editar_insumo', ['insumo' => $insumo]);
    }

    public function modificar(Request $request,$id_insumo){
        $insumo = Insumo::findOrFail($id_insumo);
        $insumo->Nombre = $request['Nombre'];
        $insumo->unidad_de_medida = $request['unidad_de_medida'];
        $insumo->descripcion = $request['descripcion'];
        $insumo->costo = $request['Costo'];
        $insumo->save();
        Bitacora::tupla_bitacora('Se Modifico el insumo:'.$insumo->id);//bitacora
        return redirect()->route('admin.insumo.index');
    }

    public function eliminar($id_insumo){
        $insumo = Insumo::findOrFail($id_insumo);
        return View('admin.gestionar_insumo.eliminar_insumo', ['insumo' => $insumo]);
    }
    public function delete(Request $request,$id_insumo){
        if($request['eliminar'] == 'ELIMINAR'){
            $insumo = Insumo::findOrFail($id_insumo);

            if( (DB::select("SELECT id FROM stock__p where id_producto=$id_insumo"))!=null)
            {
                DD('Este insumo no se puede eliminar porque ya tiene stock');

            } else {
                $insumo->delete();
            }

            return redirect()->route('admin.insumo.index');
        }
        return redirect()->route('admin.insumo.eliminar', [$id_insumo]);
    }
}
