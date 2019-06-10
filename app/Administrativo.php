<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrativo extends Model
{
    protected $table='administrativo';
    protected $fillable=['area', 'id'];

    public function personal()
    {
        return $this->belongsTo('App\Personal', 'id_personal');
    }
}
