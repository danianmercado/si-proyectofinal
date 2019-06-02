<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    public function index(){
        return view('admin.gestionar_trabajador.index');
    }

    public function show($id_servicio){

    }
    public function registrar(){
        $servicios = Servicio::all();
        return view('admin.gestionar_servicio.registrar_servicio', ['servicios' => $servicios]);
    }

}
