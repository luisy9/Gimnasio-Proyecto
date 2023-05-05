<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                // 'id' => 10,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => '1',
                'fecha_nacimiento' => '2000-01-01',
            ],
            [
                // 'id' => 10,
                'name' => 'Luis',
                'email' => 'Luis@gmail.com',
                'password' => '1',
                'fecha_nacimiento' => '2000-01-02',
            ]
        ];
        User::insert($user);

        // User::all()->each(function ($user) {
        //     $user->roles()->sync([0]);
        // });
    }
}
