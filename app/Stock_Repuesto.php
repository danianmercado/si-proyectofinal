<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock_Repuesto extends Model
{
    protected $table= 'stock__p';
    protected $fillable=['Cantidad','id_almacen', 'id_producto'];
  
    public function repuesto()
    {
        return $this->belongsTo('App\Repuesto', 'id_producto');
    }

    public function almacen()
    {
        return $this->belongsTo('App\Almacen', 'id_almacen');
    }
}
