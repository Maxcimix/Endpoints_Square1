<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre', 'descripcion', 'precio',
    ];

    public function variantes()
    {
        return $this->hasMany(VarianteProducto::class);
    }
}

