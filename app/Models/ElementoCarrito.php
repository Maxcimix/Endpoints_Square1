<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElementoCarrito extends Model
{
    protected $fillable = [
        'carrito_compra_id', 'variante_producto_id', 'cantidad'
    ];

    public function carritoCompra()
    {
        return $this->belongsTo(CarritoCompra::class);
    }

    public function varianteProducto()
    {
        return $this->belongsTo(VarianteProducto::class);
    }
}