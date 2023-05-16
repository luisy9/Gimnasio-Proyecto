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
                'imagen_categoria' => 'pectoral.webp',
            ],
            [
                'id' => 2,
                'nombre_categoria' => 'Hombro',
                'imagen_categoria' => 'hombro.webp',
            ],
            [
                'id' => 3,
                'nombre_categoria' => 'Pierna',
                'imagen_categoria' => 'pierna.webp',
            ],
            [
                'id' => 4,
                'nombre_categoria' => 'Biceps',
                'imagen_categoria' => 'biceps.webp',
            ],
            [
                'id' => 5,
                'nombre_categoria' => 'Triceps',
                'imagen_categoria' => 'triceps.webp',
            ],
            [
                'id' => 6,
                'nombre_categoria' => 'Espalda',
                'imagen_categoria' => 'espalda.webp',
            ],
            [
                'id' => 7,
                'nombre_categoria' => 'Abdominales',
                'imagen_categoria' => 'abdominales.webp',
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
