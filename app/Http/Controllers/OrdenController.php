<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdenController extends Controller
{
    public function crear(Request $request)
    {
        $carrito = $request->user()->carritoCompra()->with('items.variante')->first();

        if (!$carrito || $carrito->items->isEmpty()) {
            return response()->json(['error' => 'El carrito está vacío'], 400);
        }

        try {
            DB::beginTransaction();

            // Crear la orden
            $orden = Orden::create([
                'usuario_id' => $request->user()->id,
                'estado' => 'pendiente',
                'total' => 0
            ]);

            $total = 0;

            // Crear items de la orden
            foreach ($carrito->items as $item) {
                $subtotal = $item->variante->precio * $item->cantidad;
                $total += $subtotal;

                $orden->items()->create([
                    'variante_id' => $item->variante_id,
                    'cantidad' => $item->cantidad,
                    'precio_unitario' => $item->variante->precio,
                    'subtotal' => $subtotal
                ]);

                
                $item->variante->decrement('stock', $item->cantidad);
            }

            
            $orden->update(['total' => $total]);

            
            $carrito->items()->delete();

            DB::commit();

            return response()->json([
                'mensaje' => 'Orden creada exitosamente',
                'orden' => $orden->load('items')
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Error al crear la orden'], 500);
        }
    }

    public function listar(Request $request)
    {
        $ordenes = $request->user()->ordenes()->with('items.variante.producto')->get();
        return response()->json(['ordenes' => $ordenes]);
    }

    public function mostrar(Request $request, $ordenId)
    {
        $orden = Orden::with('items.variante.producto')->findOrFail($ordenId);
        
        // Verificar que la orden pertenece al usuario
        if ($orden->usuario_id !== $request->user()->id) {
            return response()->json(['error' => 'No autorizado'], 403);
        }

        return response()->json(['orden' => $orden]);
    }
}

