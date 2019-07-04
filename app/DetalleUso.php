<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleUso extends Model
{
    protected $table = "_detalle_uso";
    protected $fillable = ['cantidad','id_det','id_producto'];


    public function producto()
    {
        return $this->belongsTo('App\Producto', 'id_producto');
    }

    public function detalle()
    {
        return $this->belongsTo('App\DetalleTrabajo', 'id_det');
    }
}
