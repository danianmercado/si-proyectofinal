<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repuesto extends Model
{
    protected $table = 'Producto';
    protected $fillable = ['Nombre', 'descripcion', 'marca', 'procedencia', 'Perteneciente', 'Costo','unidad_de_medida', 'Tipo_producto'];

    public function ingreso_repuesto()
    {
        return $this->hasMany('App\Ingreso_repuesto', 'id_producto');
    }
}
