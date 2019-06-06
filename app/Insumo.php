<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $table='producto';
    protected $fillable=['Nombre','descripcion', 'marca', 'procedencia', 'Perteneciente','Costo','unidad_de_medida','Tipo_producto'];
  
    public function ingreso_insumo()
    {
        return $this->hasMany('App\Ingreso_Insumo', 'id_producto');
    }
  
}
