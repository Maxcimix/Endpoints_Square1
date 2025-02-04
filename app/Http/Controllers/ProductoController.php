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
}

