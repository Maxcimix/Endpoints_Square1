<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Ejemplo: establecer la longitud de cadena predeterminada para las migraciones
        Schema::defaultStringLength(191);
        
        // Aquí puedes agregar más configuraciones globales si las necesitas
    }
}