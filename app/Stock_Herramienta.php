<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock_Herramienta extends Model
{
    protected $table= 'stock__h';
    protected $fillable=['Cantidad','id_almacen', 'id_herramienta'];
  
    public function herramienta()
    {
        return $this->belongsTo('App\Herramienta', 'id_herramienta');
    }

    public function almacen()
    {
        return $this->belongsTo('App\Almacen', 'id_almacen');
    }

}
