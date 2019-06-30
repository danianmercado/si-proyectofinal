<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleServicio extends Model
{
    protected $table = "detalle_servicio";
    protected $fillable = ['id_servicio', 'descripcion'];


    public function servicio()
    {
        return $this->belongsTo('App\Servicio', 'id_servicio');
    }
}
