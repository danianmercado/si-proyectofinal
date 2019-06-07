<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AlmacenStoreRequest;
use App\Almacen;
use Illuminate\Support\Facades\DB;

class AlmacenController extends Controller
{
    public function index(){
        $almacenes=Almacen::all();
        return view('admin.gestionar_almacen.index',['almacenes'=>$almacenes]);
    }

    public function show($id_almacen){
        $almacen = Almacen::findOrFail($id_almacen);
        return View('admin.gestionar_almacen.detalle_almacen', ['almacen' => $almacen]);

    }
    public function registrar(){
        return view('admin.gestionar_almacen.registrar_almacen');
    }

    public function guardar(AlmacenStoreRequest $request){
        $almacen=new Almacen($request->all());
        $almacen->save();
        return redirect()->route('admin.almacen.index');
    }

    public function editar($id_almacen){
        $almacen = Almacen::findOrFail($id_almacen);
        return View('admin.gestionar_almacen.editar_almacen', ['almacen' => $almacen]);
    }

    public function modificar(Request $request,$id_almacen){
        $almacen = Almacen::findOrFail($id_almacen);
        $almacen->Capacidad = $request['Capacidad'];
        $almacen->ubicacion = $request['ubicacion'];
        $almacen->save();
        return redirect()->route('admin.almacen.index');
    }

    public function eliminar($id_almacen){
        $almacen = Almacen::findOrFail($id_almacen);
        return View('admin.gestionar_almacen.eliminar_almacen', ['almacen' => $almacen]);
    }
    public function delete(Request $request,$id_almacen){
        if($request['eliminar'] == 'ELIMINAR'){
            $almacen = Almacen::findOrFail($id_almacen);
            if( (DB::select("SELECT id FROM stock__p where id_almacen=$id_almacen"))!=null   ||  (DB::select("SELECT id FROM stock_h where id_almacen=$id_almacen"))!=null)
            {
                DD('Este almacen  no se puede eliminar porque ya tiene insumos');

            } else {
                $almacen->delete();
            }

            return redirect()->route('admin.almacen.index');
        }
        return redirect()->route('admin.almacen.eliminar', [$id_almacen]);
    }



       /* if($request['eliminar'] == 'ELIMINAR'){
            $almacen = Almacen::findOrFail($id_almacen);

            if( (DB::select("SELECT id FROM stock__p where id_almacen=$id_almacen"))!=null)
            {
                DD('Este almacen  no se puede eliminar porque ya tiene insumos');

            } else {
                $almacen->delete();
            }

            return redirect()->route('admin.almacen.index');
        }
        return redirect()->route('admin.almacen.eliminar', [$id_almacen]);
    }*/



        /*

        if($request['eliminar'] == 'ELIMINAR'){
            DB::table('almacen')
                ->where('id', '=', $id_almacen)
                ->delete();
           
            return redirect()->route('admin.almacen.index');
        }
        return redirect()->route('admin.almacen.eliminar', [$id_almacen]);
    }*/
}
