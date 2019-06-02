<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $table='trabajador';
    protected $fillable=['ci','nombre','telefono','correo_electronico','nit'];
}
