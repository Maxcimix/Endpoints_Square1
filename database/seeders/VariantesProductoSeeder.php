<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VariantesProductoSeeder extends Seeder
{
    public function run()
    {
        $productos = DB::table('productos')->get();

        foreach ($productos as $producto) {
            if ($producto->nombre === 'Camiseta') {
                DB::table('variante_productos')->insert([
                    [
                        'producto_id' => $producto->id,
                        'talla' => 'S',
                        'color' => 'Blanco',
                        'stock' => 10,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'producto_id' => $producto->id,
                        'talla' => 'M',
                        'color' => 'Negro',
                        'stock' => 15,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ]);
            }
        }
    }
}