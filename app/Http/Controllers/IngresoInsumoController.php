<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\IngresoInsumoStoreRequest;
use App\Ingreso_Insumo;
use App\Insumo;
use App\Almacen;
use Illuminate\Support\Facades\DB;
class IngresoInsumoController extends Controller
{

 
    public function registrar(){
        $insumos = Insumo::all();
        $almacenes = Almacen::all();
        return view('admin.gestionar_ingreso.registrar_ingreso_insumo', ['insumos' => $insumos,'almacenes' => $almacenes]);
    }
    
    public function guardar(IngresoInsumoStoreRequest $request){
        $ingreso_insumo = new Ingreso_Insumo($request->all());
        $ingreso_insumo->save();
        return redirect()->route('admin.insumo.index');
    }
    
    public function editar($id_ingreso_insumo){
        $ingreso_insumo = Ingreso_Insumo::findOrFail($id_ingreso_insumo);
        $insumos = Insumo::all();
        $almacenes = Almacen::all();
        return View('admin.gestionar_ingreso.editar_ingreso_insumo', ['ingreso_insumo' => $ingreso_insumo,'insumos' => $insumos,'almacenes' => $almacenes]);
    }


    public function modificar(Request $request,$id_ingreso_insumo){
        $ingreso_insumo = Ingreso_Insumo::findOrFail($id_ingreso_insumo);
        $ingreso_insumo->id_almacen = $request['id_almacen'];
        $ingreso_insumo->id_producto = $request['id_producto'];
        $cant=($ingreso_insumo->Cantidad);
        $ingreso_insumo->Cantidad = $request['Cantidad'];
        $suma=$cant+ $ingreso_insumo->Cantidad;
        $ingreso_insumo->Cantidad = $suma;
        $ingreso_insumo->save();
        return redirect()->route('admin.insumo.index');
    }
}
