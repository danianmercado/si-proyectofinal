<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StockRepuestoStoreRequest;
use App\Stock_repuesto;
use App\Almacen;
use App\Repuesto;
use Illuminate\Support\Facades\DB;

class StockRepuestoController extends Controller
{
    public function index(){
        $stock_repuestos=Stock_repuesto::all();
        return view('admin.gestionar_stock_repuesto.index',['stock_repuestos'=>$stock_repuestos]);
    }

    public function show($id_repuesto){
        $stock_repuesto = Stock_repuesto::findOrFail($id_repuesto);
        return View('admin.gestionar_stock_repuesto.detalle_stock_repuesto', ['stock_repuesto' => $stock_repuesto]);

    }
    public function registrar(){
        $repuestos = Repuesto::all();
        $almacenes = Almacen::all();
        return view('admin.gestionar_stock_repuesto.registrar_stock_repuesto', ['repuestos' => $repuestos,'almacenes' => $almacenes]);
    }

    public function guardar(StockRepuestoStoreRequest $request){
        $stock_repuesto=new Stock_repuesto($request->all());
        $stock_repuesto->save();
        return redirect()->route('admin.stock_repuesto.index');
    }

    public function editar($id_stock_repuesto){
        $stock_repuesto = Stock_repuesto::findOrFail($id_stock_repuesto);
        return View('admin.gestionar_stock_repuesto.editar_stock_repuesto', ['stock_repuesto' => $stock_repuesto]);
    }

    public function modificar(Request $request,$id_stock_repuesto){
        $stock_repuesto = Stock_repuesto::findOrFail($id_stock_repuesto);
        $stock_repuesto->Cantidad=$request['Cantidad'];;
        $stock_repuesto->save();
        return redirect()->route('admin.stock_repuesto.index');
    }

    public function eliminar($id_repuesto){
        $stock_repuesto = Stock_repuesto::findOrFail($id_repuesto);
        return View('admin.gestionar_stock_repuesto.eliminar_stock_repuesto', ['stock_repuesto' => $stock_repuesto]);
    }
    public function delete(Request $request,$id_repuesto){
        if($request['eliminar'] == 'ELIMINAR'){
            DB::table('stock__p')
                ->where('id', '=', $id_repuesto)
                ->delete();
           
            return redirect()->route('admin.stock_repuesto.index');
        }
        return redirect()->route('admin.stock_repuesto.eliminar', [$id_repuesto]);
    }
}
