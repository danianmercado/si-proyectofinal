<?php

namespace App\Http\Controllers;

use App\Bitacora;
use Illuminate\Http\Request;
use App\Http\Requests\StockHerramientaStoreRequest;
use App\Stock_herramienta;
use App\Almacen;
use App\Herramienta;
use Illuminate\Support\Facades\DB;


class StockHerramientaController extends Controller
{
    public function index(){
        $stock_herramientas = Stock_herramienta::all();
        return view('admin.gestionar_stock_herramienta.index',['stock_herramientas'=>$stock_herramientas]);
    }

    public function show($id_herramienta){
        Bitacora::tupla_bitacora('Mostrar la herramienta :'.$id_herramienta);//bitacora
        $stock_herramienta = Stock_herramienta::findOrFail($id_herramienta);
        return View('admin.gestionar_stock_herramienta.detalle_stock_herramienta', ['stock_herramienta' => $stock_herramienta]);

    }
    public function registrar(){
        Bitacora::tupla_bitacora('Entro al formulario de registro de stock de herramienta');//bitaacora
        $herramientas = Herramienta::all();
        $almacenes = Almacen::all();
        return view('admin.gestionar_stock_herramienta.registrar_stock_herramienta', ['herramientas' => $herramientas,'almacenes' => $almacenes]);
    }

    public function guardar(StockHerramientaStoreRequest $request){
        $stock_herramienta=new Stock_herramienta($request->all());
        $stock_herramienta->save();
        Bitacora::tupla_bitacora('Registro al stock herramienta:'.$stock_herramienta->id);//bitacora
        return redirect()->route('admin.stock_herramienta.index');
    }

    public function editar($id_stock_herramienta){
        Bitacora::tupla_bitacora('Entro al formulario para editar stock de herramienta :'.$id_stock_herramienta);//bitacora
        $stock_herramienta = Stock_herramienta::findOrFail($id_stock_herramienta);
        return View('admin.gestionar_stock_herramienta.editar_stock_herramienta', ['stock_herramienta' => $stock_herramienta]);
    }

    public function modificar(Request $request,$id_stock_herramienta){
        $stock_herramienta = Stock_herramienta::findOrFail($id_stock_herramienta);
        $stock_herramienta->Cantidad=$request['Cantidad'];;
        $stock_herramienta->save();
        Bitacora::tupla_bitacora('Se Modifico el stock de herramienta:'.$stock_herramienta->id);//bitacora
        return redirect()->route('admin.stock_herramienta.index');
    }

    public function eliminar($id_herramienta){
        $stock_herramienta = Stock_herramienta::findOrFail($id_herramienta);
        return View('admin.gestionar_stock_herramienta.eliminar_stock_herramienta', ['stock_herramienta' => $stock_herramienta]);
    }
    public function delete(Request $request,$id_herramienta){
        if($request['eliminar'] == 'ELIMINAR'){
            DB::table('stock__h')
                ->where('id', '=', $id_herramienta)
                ->delete();
           
            return redirect()->route('admin.stock_herramienta.index');
        }
        return redirect()->route('admin.stock_herramienta.eliminar', [$id_herramienta]);
    }
}
