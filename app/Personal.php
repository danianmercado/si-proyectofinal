<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Personal extends Model
{

    protected $table = 'personal';
    protected $fillable = ['id', 'ci', 'nombre', 'paterno', 'materno', 'direccion', 'telefono', 'fecha_nacimiento'];

    public function trabajador()
    {
        return $this->hasOne('App\Trabajador', 'id_personal');

    }

    public function administrativo()
    {
        return $this->hasOne('App\Administrativo', 'id_personal');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id_personal');
    }

    public function recepciones()
    {
        return $this->hasMany(Recepcion::class, 'id_personal');
    }
}
