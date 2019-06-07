<?php

namespace App\Http\Controllers;

use App\Ingreso_repuesto;
use App\Repuesto;
use App\Almacen;
use App\Http\Requests\IngresoRepuestoStoreRequest;
use Illuminate\Http\Request;

class IngresoRepuestoController extends Controller
{

    public function registrar(){
        $repuestos = Repuesto::all();
        $almacenes = Almacen::all();
        return view('admin.gestionar_ingreso.registrar_ingreso_repuesto', ['repuestos' => $repuestos,'almacenes' => $almacenes]);
    }

    public function guardar(IngresoRepuestoStoreRequest $request){
        $ingreso_repuesto = new Ingreso_repuesto($request->all());
        $ingreso_repuesto->save();
        return redirect()->route('admin.repuesto.index');
    }

    public function editar($id_ingreso_repuesto){
        $ingreso_repuesto = Ingreso_repuesto::findOrFail($id_ingreso_repuesto);
        $repuestos = Repuesto::all();
        $almacenes = Almacen::all();
        return View('admin.gestionar_ingreso.editar_ingreso_repuesto', ['ingreso_repuesto' => $ingreso_repuesto,'repuestos' => $repuestos,'almacenes' => $almacenes]);
    }


    public function modificar(Request $request,$id_ingreso_repuesto){
        $ingreso_repuesto = Ingreso_repuesto::findOrFail($id_ingreso_repuesto);
        $ingreso_repuesto->id_almacen = $request['id_almacen'];
        $ingreso_repuesto->id_producto = $request['id_producto'];
        $cant=($ingreso_repuesto->Cantidad);
        $ingreso_repuesto->Cantidad = $request['Cantidad'];
        $suma=$cant+ $ingreso_repuesto->Cantidad;
        $ingreso_repuesto->Cantidad = $suma;
        $ingreso_repuesto->save();
        return redirect()->route('admin.repuesto.index');
    }

}


