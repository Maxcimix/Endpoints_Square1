<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoCompraController;
use App\Http\Controllers\OrdenController;
use Illuminate\Support\Facades\Route;

// Rutas públicas
Route::post('/registro', [UsuarioController::class, 'registro']);#ok
Route::post('/login', [UsuarioController::class, 'login']);#ok
Route::get('/productos', [ProductoController::class, 'productos']);#ok
Route::get('/productos/{id}', [ProductoController::class, 'show']);#ok

// Rutas protegidas
Route::middleware('auth:sanctum')->group(function () {
    // Usuario
    Route::get('/perfil', [UsuarioController::class, 'perfil']);#ok
    Route::post('/logout', [UsuarioController::class, 'logout']);#ok

    // Carrito
    Route::get('/carrito', [CarritoCompraController::class, 'verCarrito']);
    Route::post('/carrito/agregar', [CarritoCompraController::class, 'agregarItem']);
    Route::put('/carrito/actualizar/{id}', [CarritoCompraController::class, 'actualizarItem']);
    Route::delete('/carrito/eliminar/{id}', [CarritoCompraController::class, 'eliminarItem']);

    // Órdenes
    Route::post('/ordenes/crear', [OrdenController::class, 'crear']);
    Route::get('/ordenes', [OrdenController::class, 'listar']);
    Route::get('/ordenes/{id}', [OrdenController::class, 'mostrar']);
});