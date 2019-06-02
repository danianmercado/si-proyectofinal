<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function registrar(){
        return view('auth.registrar');
    }

    public function index()
    {
        return view('index');
    }

    public function guardar(Request $request)
    {
        dd($request->all());
    }
    public function loguear(Request $request){
        dd($request->all());
    }
    public function prueba($nombre){

        dd($nombre);
    }
}
