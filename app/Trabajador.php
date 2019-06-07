<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $table='trabajador';
    protected $fillable=['especialidad', 'id_personal'];

    public function personal()
    {
        return $this->belongsTo('App\Personal', 'id_personal');
    }
}
