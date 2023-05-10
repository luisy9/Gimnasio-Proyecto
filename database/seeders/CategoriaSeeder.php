<?php

namespace Database\Seeders;

use App\Models\categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoria = [
            [
                'id' => 1,
                'nombre_categoria' => 'Pecho',
                'imagen_categoria' => 'Pectorial.jpg',
            ],
            [
                'id' => 2,
                'nombre_categoria' => 'Hombro',
                'imagen_categoria' => 'Hombro.jpg',
            ],
            [
                'id' => 3,
                'nombre_categoria' => 'Pierna',
                'imagen_categoria' => 'Pierna.jpg',
            ],
            [
                'id' => 4,
                'nombre_categoria' => 'Biceps',
                'imagen_categoria' => 'Biceps.jpg',
            ],
            [
                'id' => 5,
                'nombre_categoria' => 'Triceps',
                'imagen_categoria' => 'Triceps.jpg',
            ],
            [
                'id' => 6,
                'nombre_categoria' => 'Espalda',
                'imagen_categoria' => 'Espalda.jpg',
            ],
            [
                'id' => 7,
                'nombre_categoria' => 'Abdominales',
                'imagen_categoria' => 'Abdominales.jpg',
            ],
        ];

        $files = Storage::disk('public')->allFiles('img');
        foreach ($files as $file) {
            categoria::create([
                'image' => $file
            ]);
        }

        categoria::insert($categoria);
    }
}
