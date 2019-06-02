<?php

namespace App\Http\Controllers;

use App\Personal;
use App\User;
use Illuminate\Http\Request;

class ApiUsuarioController extends Controller
{
    public function guardar(Request $request)
    {
        $personal = new Personal($request->all());
        $personal->save();

        $usuario = new User();
        $usuario->email = $request['email'];
        $usuario->password = bcrypt($request['password']);
        $usuario->id_personal = $personal->id;
        $usuario->save();
        dd($personal);
    }
}
