<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='cliente';
    protected $fillable=['ci','nombre','telefono','correo_electronico','nit'];

    public function vehiculos()
    {
        return $this->hasMany('App\Vehiculo', 'id_cliente');
    }
}
