<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StockInsumoStoreRequest;
use App\Stock_insumo;
use App\Almacen;
use App\Insumo;
use Illuminate\Support\Facades\DB;

class StockInsumoController extends Controller
{
    public function index(){
        $stock_insumos = DB::table('stock__p')
            ->join('producto', 'stock__p.id_producto', '=', 'producto.id')
            ->join('almacen', 'stock__p.id_almacen', '=', 'almacen.id')
            ->where('producto.Tipo_producto', '=', 'I')
            ->select('stock__p.id as id', 'producto.nombre as nombre', 'producto.descripcion as descripcion',
                'almacen.ubicacion', DB::raw('sum(cantidad) as cantidad'))
            ->groupBy('stock__p.id', 'producto.nombre', 'producto.descripcion', 'almacen.ubicacion')
            ->get();

        return view('admin.gestionar_stock_insumo.index',['stock_insumos'=>$stock_insumos]);
    }

    public function show($id_insumo){
        $stock_insumo = Stock_insumo::findOrFail($id_insumo);
        return View('admin.gestionar_stock_insumo.detalle_stock_insumo', ['stock_insumo' => $stock_insumo]);

    }
    public function registrar(){
        $insumos = Insumo::all();
        $almacenes = Almacen::all();
        return view('admin.gestionar_stock_insumo.registrar_stock_insumo', ['insumos' => $insumos,'almacenes' => $almacenes]);
    }

    public function guardar(StockInsumoStoreRequest $request){
        $stock_insumo=new Stock_insumo($request->all());
        $stock_insumo->save();
        return redirect()->route('admin.stock_insumo.index');
    }

    public function editar($id_stock_insumo){
        $stock_insumo = Stock_insumo::findOrFail($id_stock_insumo);
        return View('admin.gestionar_stock_insumo.editar_stock_insumo', ['stock_insumo' => $stock_insumo]);
    }

    public function modificar(Request $request,$id_stock_insumo){
        $stock_insumo = Stock_insumo::findOrFail($id_stock_insumo);
        $stock_insumo->Cantidad=$request['Cantidad'];
        $stock_insumo->save();
        return redirect()->route('admin.stock_insumo.index');
    }

    public function eliminar($id_insumo){
        $stock_insumo = Stock_insumo::findOrFail($id_insumo);
        return View('admin.gestionar_stock_insumo.eliminar_stock_insumo', ['stock_insumo' => $stock_insumo]);
    }
    public function delete(Request $request,$id_insumo){
        if($request['eliminar'] == 'ELIMINAR'){
            DB::table('stock__p')
                ->where('id', '=', $id_insumo)
                ->delete();
           
            return redirect()->route('admin.stock_insumo.index');
        }
        return redirect()->route('admin.stock_insumo.eliminar', [$id_insumo]);
    }
}
