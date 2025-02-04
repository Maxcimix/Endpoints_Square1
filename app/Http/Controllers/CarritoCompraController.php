<?php

namespace App\Http\Controllers;

use App\Models\CarritoCompra;
use App\Models\ItemCarrito;
use Illuminate\Http\Request;

class CarritoCompraController extends Controller
{
    public function verCarrito(Request $request)
    {
        $carrito = $request->user()->carritoCompra()->with('items.variante.producto')->first();
        if (!$carrito) {
            $carrito = $request->user()->carritoCompra()->create();
        }
        return response()->json(['carrito' => $carrito]);
    }

    public function agregarItem(Request $request)
    {
        $request->validate([
            'variante_id' => 'required|exists:variantes_producto,id',
            'cantidad' => 'required|integer|min:1'
        ]);

        $carrito = $request->user()->carritoCompra;
        if (!$carrito) {
            $carrito = $request->user()->carritoCompra()->create();
        }

        $itemCarrito = $carrito->items()->updateOrCreate(
            ['variante_id' => $request->variante_id],
            ['cantidad' => $request->cantidad]
        );

        return response()->json([
            'mensaje' => 'Producto agregado al carrito',
            'item' => $itemCarrito
        ]);
    }

    public function actualizarItem(Request $request, $itemId)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1'
        ]);

        $item = ItemCarrito::findOrFail($itemId);
        
        // Verificar que el item pertenece al carrito del usuario
        if ($item->carritoCompra->usuario_id !== $request->user()->id) {
            return response()->json(['error' => 'No autorizado'], 403);
        }

        $item->update(['cantidad' => $request->cantidad]);

        return response()->json([
            'mensaje' => 'Cantidad actualizada',
            'item' => $item
        ]);
    }

    public function eliminarItem(Request $request, $itemId)
    {
        $item = ItemCarrito::findOrFail($itemId);
        
       
        if ($item->carritoCompra->usuario_id !== $request->user()->id) {
            return response()->json(['error' => 'No autorizado'], 403);
        }

        $item->delete();

        return response()->json(['mensaje' => 'Item eliminado del carrito']);
    }
}

