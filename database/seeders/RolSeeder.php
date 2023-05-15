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
                'nombre_role' => 'gestion_users'
            ],
            [
                'id' => 4,
                'nombre_role' => 'gestion_roles'
            ],
            [
                'id' => 5,
                'nombre_role' => 'gestion_tarifas'
            ],
            [
                'id' => 6,
                'nombre_role' => 'gestion_entrenamiento'
            ],
            [
                'id' => 7,
                'nombre_role' => 'gestion_clases'
            ],

        ];
        role::insert($role);
    }
}
