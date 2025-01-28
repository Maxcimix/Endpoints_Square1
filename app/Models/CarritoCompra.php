<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarritoCompra extends Model
{
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function elementos()
    {
        return $this->hasMany(ElementoCarrito::class);
    }
}