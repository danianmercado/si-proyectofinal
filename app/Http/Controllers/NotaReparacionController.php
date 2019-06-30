<?php

namespace App\Http\Controllers;

use App\Bitacora;
use App\Http\Requests\NotaReparacionStoreRequest;
use App\Nota_reparacion;
use App\OrdenTrabajo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotaReparacionController extends Controller
{
    public function index()
    {
        $notas = Nota_reparacion::all();
        return view('admin.gestionar_nota_reparacion.index', ['notas'=>$notas]);
    }

    public function show($id_nota)
    {
        $nota = Nota_reparacion::findOrFail($id_nota);
        return view('admin.gestionar_nota_reparacion.detalle_nota_reparacion', ['nota'=>$nota]);
    }

    public function registrar(){
        Bitacora::tupla_bitacora('Entro al formulario de registro de nota de reparacion');//bitaacora
        $ordenes = OrdenTrabajo::all();
        return view('admin.gestionar_nota_reparacion.registrar_nota_reparacion', ['ordenes' => $ordenes]);
    }


    public function guardar(NotaReparacionStoreRequest $request){
      /*  $id_orden = $request['id'];
        $suma = DB::table('detalle_trabajo')
            ->where('id_ot', '=', $id_orden)
            ->select(DB::raw('SUM(detalle_trabajo.precio)as total'))
            ->groupBy('id_ot')
            ->first();*/


        $nota= new Nota_reparacion($request->all());
     ///   $nota->total=$suma['total'];
        $nota->save();
        Bitacora::tupla_bitacora('Registro nota de reparacion:'.$nota->id);//bitacora
        return redirect()->route('admin.nota_reparacion.index');
    }

}
