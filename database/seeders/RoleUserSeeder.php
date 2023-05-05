<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\roleUser;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleUser = [
            [
                'id' => 1,
                'role_id' => 1,
                'user_id' => 1,
            ],
        ];
        roleUser::insert($roleUser);
    }
}
