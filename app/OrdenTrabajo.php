<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model
{

    protected $table = "orden_trabajo";
    protected $fillable = ['tiempo_estimado', 'id_trabajador', 'id_recepcion'];


    public function trabajador()
    {
        return $this->belongsTo('App\Trabajador', 'id_trabajador');
    }
    public function recepcion()
    {
        return $this->belongsTo('App\Recepcion', 'id_recepcion');
    }
}
