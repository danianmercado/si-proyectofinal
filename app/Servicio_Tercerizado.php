<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio_Tercerizado extends Model
{
    protected $table='servicio_tercerizado';
    protected $fillable=['Contacto','Ubicacion','telefono'];
}
