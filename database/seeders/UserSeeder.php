<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $user = [
        //     [
        //         'id' => 1,
        //         'name' => 'Ares',
        //         'email' => 'farb@gmail.com',
        //         'password' => '1',
        //         'fecha_nacimiento' => '2/12/2003',
        //     ]
        // ];
        // User::insert($user);

        // User::all()->each(function ($user) {
        //     $user->role()->sync([0]);
        // });
    }
}
