<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VarianteProducto extends Model
{
    protected $fillable = [
        'producto_id', 'talla', 'color', 'stock', 'precio'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function elementosCarrito()
    {
        return $this->hasMany(ElementoCarrito::class);
    }

    public function elementosOrden()
    {
        return $this->hasMany(ElementoOrden::class);
    }
}

