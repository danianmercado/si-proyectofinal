<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table='vehiculo';
    protected $fillable=['placa','anio','color','marca','modelo', 'id_cliente'];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'id_cliente');
    }
}
