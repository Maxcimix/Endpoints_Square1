<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $fillable = [
        'usuario_id', 'estado', 'total'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function elementos()
    {
        return $this->hasMany(ElementoOrden::class);
    }
}

