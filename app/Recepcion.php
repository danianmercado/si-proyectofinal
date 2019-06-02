<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recepcion extends Model
{
    protected $table='recepcion';
    protected $fillable=['fecha_ingreso','estado','id_vehiculo'];

    public function vehiculo()
    {
        return $this->belongsTo('App\Vehiculo', 'id_vehiculo');
    }
}
