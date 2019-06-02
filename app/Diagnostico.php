<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    protected $table='diagnostico';
    protected $fillable=['descripcion', 'id_recepcion'];

    public function Recepcion()
    {
        return $this->belongsTo('App\Recepcion', 'id_recepcion');
    }
}
