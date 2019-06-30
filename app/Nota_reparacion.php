<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota_reparacion extends Model
{
    protected $table = "_nota_reparacion";
    protected $fillable = ['Fecha_entrega', 'observaciones','total','id_ot'];


    public function orden_trabajo()
    {
        return $this->belongsTo('App\OrdenTrabajo', 'orden_trabajo');
    }

}
