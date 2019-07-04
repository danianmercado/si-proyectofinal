<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleServicioTercerizado extends Model
{
    protected $table = "detalle_servicio_tercerizado";
    protected $fillable = ['id_st', 'descripcion', 'fecha','id_detTrab'];


    public function detalle_trabajo(){
        return $this->belongsTo('App\DetalleTrabajo', 'id_detTrab');
    }

}
