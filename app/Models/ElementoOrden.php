<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElementoOrden extends Model
{
    protected $fillable = [
        'orden_id', 'variante_producto_id', 'cantidad', 'precio_unitario', 'subtotal'
    ];

    public function orden()
    {
        return $this->belongsTo(Orden::class);
    }

    public function varianteProducto()
    {
        return $this->belongsTo(VarianteProducto::class);
    }
}

