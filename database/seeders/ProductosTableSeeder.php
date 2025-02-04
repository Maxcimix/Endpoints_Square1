<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('productos')->insert([
            [
                'nombre' => 'Camiseta',
                'descripcion' => 'Camiseta de algodón premium',
                'precio' => 29.99,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Pantalón',
                'descripcion' => 'Pantalón vaquero clásico',
                'precio' => 49.99,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}