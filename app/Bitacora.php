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

    public static function tupla_bitacora($accion){
      $tupla_bitacora = new Bitacora();
      $tupla_bitacora->id_usuario = \Auth::user()->id;
      $tupla_bitacora->accion = $accion;
      $tupla_bitacora->save();
    }
}
