<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Personal extends Model
{

    protected $table = 'personal';
    protected $fillable = ['id','nombre', 'paterno', 'materno', 'direccion', 'telefono', 'fecha_nacimiento'];

    public function trabajador()
    {
        return $this->hasOne('App\Trabajador', 'id_personal');

    }
    public function administrativo(){
        return $this->hasOne('App\Administrativo', 'id_personal');
    }
}
