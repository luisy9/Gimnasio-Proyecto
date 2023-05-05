<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\role;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $role = [
            [
                'id' => 1,
                'nombre_role' => 'admin',
            ],
            [
                'id' => 2,
                'nombre_role' => 'default_user'
            ],
            [
                'id' => 3,
                'nombre_role' => 'crear_user'
            ],
            [
                'id' => 4,
                'nombre_role' => 'modificar_user'
            ],
            [
                'id' => 5,
                'nombre_role' => 'eliminar_user'
            ],
            [
                'id' => 6,
                'nombre_role' => 'añadir_tarifa'
            ],
            [
                'id' => 7,
                'nombre_role' => 'eliminar_tarifa'
            ],
            [
                'id' => 8,
                'nombre_role' => 'modificar_tarifa'
            ],
            [
                'id' => 9,
                'nombre_role' => 'crear_producto'
            ],
            [
                'id' => 10,
                'nombre_role' => 'modificar_producto'
            ],
            [
                'id' => 11,
                'nombre_role' => 'eliminar_producto'
            ],
            [
                'id' => 12,
                'nombre_role' => 'crear_musculo'
            ],
            [
                'id' => 13,
                'nombre_role' => 'eliminar_musculo'
            ], [
                'id' => 14,
                'nombre_role' => 'modificar_musculo'
            ]

        ];
        role::insert($role);
    }
}
