<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    //
    protected $table='bitacora';
    protected $fillable=['id_usuario','accion'];

    public function user()
    {
        return $this->belongsTo('App\User','id_usuario');
    }
}
