<?php

namespace App\Http\Controllers;

use App\Bitacora;
use Illuminate\Http\Request;
use App\Http\Requests\DetalleUsoStoreRequest;
use App\DetalleUso;
use App\Insumo;
use App\DetalleTrabajo;
use Illuminate\Support\Facades\DB;

class DetalleUsoController extends Controller
{


    public function registrar(){
        Bitacora::tupla_bitacora('Entro al formulario de registro de detalle de uso');//bitaacora
        $productos = Insumo::all();
        $detalletrabajo = DetalleTrabajo::all();
        return view('admin.gestionar_detalleuso.registrar_detalleuso', ['productos' => $productos,'detalletrabajo' => $detalletrabajo]);
    }


    public function guardar(DetalleUsoStoreRequest $request){
        $detalleuso = new  DetalleUso($request->all());
   
        $detalleuso->save();
        Bitacora::tupla_bitacora('Registro el detalle de uso:'.$detalleuso->id);//bitacora
        return redirect()->route('admin.detalle_trabajo.index');
    }



}
