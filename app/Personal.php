<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Personal extends Model
{

    protected $table = 'personal';
    protected $fillable = ['nombre', 'paterno', 'materno', 'direccion', 'telefono', 'fecha_nacimiento'];

    public function user()
    {
        return $this->hasOne('App\User', 'id_personal');
    }
}
