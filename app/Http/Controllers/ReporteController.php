<?php

namespace App\Http\Controllers;

use App\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{

     public function _construct(){
         $this->middleware('guest');
     }

    public function showVehiculosReporte(Request $request){
        $allVehiculos = Vehiculo::join('recepcion','vehiculo.id','recepcion.id_vehiculo')
            ->join('cliente','cliente.id','vehiculo.id_cliente')
            ->select(DB::raw('vehiculo.id,vehiculo.placa,vehiculo.marca,vehiculo.modelo,cliente.nombre,COUNT(recepcion.id) as totalIngresos'))
            ->groupBy('vehiculo.id','vehiculo.placa','vehiculo.marca','vehiculo.modelo','cliente.nombre')
            ->get();

       $view=view('admin.gestionar_reporte.reporte_vehiculo', compact('allVehiculos'))->render();
       $pdf= App::make('dompdf.wrapper');
       $pdf->loadHTML($view);
       return $pdf->stream('reporte_vehiculos'.'.pdf');

    }
}
