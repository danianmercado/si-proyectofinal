<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests\VehiculoStoreRequest;
use App\Vehiculo;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index(){
        $vehiculos = Vehiculo::all();
        return view('admin.gestionar_vehiculo.index',['vehiculos'=>$vehiculos]);
    }

    public function show($id_vehiculo){

    }
    public function registrar(){
        $clientes = Cliente::all();
        return view('admin.gestionar_vehiculo.registrar_vehiculo', ['clientes' => $clientes]);
    }

    public function guardar(VehiculoStoreRequest $request){
        $vehiculo = new Vehiculo($request->all());
        $vehiculo->save();
        return redirect()->route('admin.vehiculo.index');
    }

    public function editar($id_vehiculo){
        $vehiculo = Vehiculo::findOrFail($id_vehiculo);
        $clientes = Cliente::all();
        return View('admin.gestionar_vehiculo.editar_vehiculo', ['vehiculo' => $vehiculo,'clientes' => $clientes]);
    }

    public function modificar(Request $request,$id_vehiculo){
        $vehiculo = Vehiculo::findOrFail($id_vehiculo);
        $vehiculo->id_cliente = $request['id_cliente'];
        $vehiculo->placa = $request['placa'];
        $vehiculo->anio = $request['anio'];
        $vehiculo->color = $request['color'];
        $vehiculo->marca = $request['marca'];
        $vehiculo->modelo = $request['modelo'];
        $vehiculo->save();
        return redirect()->route('admin.vehiculo.index');
    }


    public function eliminar($id_vehiculo){
        $vehiculo = Vehiculo::findOrFail($id_vehiculo);
        return View('admin.gestionar_vehiculo.eliminar_vehiculo', ['vehiculo' => $vehiculo]);
    }
    public function delete(Request $request,$id_vehiculo){
        if($request['eliminar'] == 'ELIMINAR'){
            $vehiculo = Vehiculo::findOrFail($id_vehiculo);

            if( (DB::select("SELECT id FROM recepcion where id_vehiculo=$id_vehiculo"))!=null)
            {
                DD('Este vehículo no se puede eliminar porque ya tiene una recepcion');

            } else {
                $vehiculo->delete();
            }

            return redirect()->route('admin.vehiculo.index');
        }
        return redirect()->route('admin.vehiculo.eliminar', [$id_vehiculo]);
    }


}
