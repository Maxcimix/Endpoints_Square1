<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'nombre' => 'Usuario Test',
                'email' => 'test@example.com',
                'contraseña' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Admin',
                'email' => 'admin@example.com',
                'contraseña' => Hash::make('admin123'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}