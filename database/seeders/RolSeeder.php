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
            ]
        ];
        role::insert($role);
    }
}
