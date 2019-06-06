<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repuesto extends Model
{
    protected $table='Producto';
    protected $fillable=['Nombre','descripcion','Costo','procedencia','Tipo_producto'];
}
