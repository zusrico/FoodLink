<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Usuario Administrador
        User::factory()->create([
            'name' => 'Admin',
            'apellidos' => 'Sistema',
            'email' => 'admin@foodlink.com',
            'password' => 'password',
            'role' => 'admin',
            'telefono' => '+584241234567',
            'direccion' => 'Avenida Principal, Caracas',
            'rif' => 'V-12345678',
            'estado' => 'activo',
        ]);

        // Usuario Normal
        User::factory()->create([
            'name' => 'Usuario',
            'apellidos' => 'Prueba',
            'email' => 'user@foodlink.com',
            'password' => 'password',
            'role' => 'user',
            'telefono' => '+584241234568',
            'direccion' => 'Calle Secundaria, Caracas',
            'rif' => 'V-87654321',
            'estado' => 'activo',
        ]);
    }
}
