<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('variantes')->get();
        return response()->json(['productos' => $productos]);
    }

    public function show($productoId)
    {
        $producto = Producto::with('variantes')->findOrFail($productoId);
        return response()->json(['producto' => $producto]);
    }

    // Nuevo método para crear productos
    public function Productos(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
        ]);

        $producto = Producto::create($request->all());

        return response()->json([
            'mensaje' => 'Producto creado exitosamente',
            'producto' => $producto
        ], 201);
    }

    
}

