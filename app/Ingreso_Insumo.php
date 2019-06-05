<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso_Insumo extends Model
{
    protected $table='stock__p';
    protected $fillable=['Cantidad','id_almacen','id_producto'];

    public function almacen()
    {
        return $this->belongsTo('App\Almacen', 'id_almacen');
    }

    public function insumo()
    {
        return $this->belongsTo('App\Insumo', 'id_producto');
    }
}
