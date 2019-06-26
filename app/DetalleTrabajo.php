<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleTrabajo extends Model
{
    protected $table= 'detalle_trabajo';
    protected $fillable=['id','id_ot','precio', 'descripcion'];//

public function OrdenTrabajo()
{
    return $this->belongsTo('App\OrdenTrabajo', 'id_ot');
}

}
