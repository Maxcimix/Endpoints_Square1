<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoCompraController;
use App\Http\Controllers\OrdenController;

// Rutas de Usuarios
Route::post('/registro', [UsuarioController::class, 'registro']);
Route::post('/login', [UsuarioController::class, 'login']);

// Rutas protegidas por Sanctum
Route::middleware('auth:sanctum')->group(function () {
    // Usuario
    Route::get('/perfil', [UsuarioController::class, 'perfil']);
    Route::post('/logout', [UsuarioController::class, 'logout']);

    // Carrito de Compras
    Route::get('/carrito', [CarritoCompraController::class, 'verCarrito']);
    Route::post('/carrito/agregar', [CarritoCompraController::class, 'agregarAlCarrito']);
    Route::put('/carrito/actualizar/{elementoCarritoId}', [CarritoCompraController::class, 'actualizarCarrito']);
    Route::delete('/carrito/eliminar/{elementoCarritoId}', [CarritoCompraController::class, 'eliminarDelCarrito']);

    // Órdenes
    Route::post('/ordenes/crear', [OrdenController::class, 'crearOrden']);
    Route::get('/ordenes', [OrdenController::class, 'listarOrdenes']);
    Route::get('/ordenes/{ordenId}', [OrdenController::class, 'verOrden']);
});

// Rutas de Productos (no protegidas)
Route::get('/productos', [ProductoController::class, 'listarProductos']);
Route::get('/productos/{productoId}', [ProductoController::class, 'verProducto']);

Route::get('/test', function () {
    return response()->json(['message' => 'API funcionando']);
});