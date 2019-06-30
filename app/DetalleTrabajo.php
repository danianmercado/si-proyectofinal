<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleTrabajo extends Model
{
    protected $table= 'detalle_trabajo';
    protected $fillable=['id','id_ot','id_servicio','precio', 'descripcion'];//

    public function OrdenTrabajo()
    {
        return $this->belongsTo('App\OrdenTrabajo', 'id_ot');
    }
    public function servicio()
    {
        return $this->belongsTo('App\Servicio', 'id_servicio');
    }
}
