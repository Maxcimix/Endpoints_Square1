<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'nombre', 'email', 'contraseña',
    ];

    protected $hidden = [
        'contraseña', 'remember_token',
    ];

    public function carritoCompra()
    {
        return $this->hasOne(CarritoCompra::class);
    }

    public function ordenes()
    {
        return $this->hasMany(Orden::class);
    }
}