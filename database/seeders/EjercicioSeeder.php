<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ejercicio;

class EjercicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ejercicio = [
            [
                'id' => 1,
                'nombre_ejercicio' => 'Press Banca',
                'imagen_ejercicio' => 'press_banca.jpg',
                'categoria_id' => 1,
            ],
            [
                'id' => 2,
                'nombre_ejercicio' => 'Press Inclinado',
                'imagen_ejercicio' => 'press_inclinado.jpg',
                'categoria_id' => 1,
            ],
            [
                'id' => 3,
                'nombre_ejercicio' => 'Flies',
                'imagen_ejercicio' => 'flies.jpg',
                'categoria_id' => 1,
            ],
            [
                'id' => 4,
                'nombre_ejercicio' => 'Press Maquina',
                'imagen_ejercicio' => 'press_maquina.jpg',
                'categoria_id' => 1,
            ],
            [
                'id' => 5,
                'nombre_ejercicio' => 'Press Militar',
                'imagen_ejercicio' => 'press_maquina.jpg',
                'categoria_id' => 2,
            ],
            [
                'id' => 6,
                'nombre_ejercicio' => 'Hombro Posterior',
                'imagen_ejercicio' => 'hombro_posterior.jpg',
                'categoria_id' => 2,
            ],
            [
                'id' => 7,
                'nombre_ejercicio' => 'Press Militar Libre',
                'imagen_ejercicio' => 'press_militar_libre.jpg',
                'categoria_id' => 2,
            ],
            [
                'id' => 8,
                'nombre_ejercicio' => 'Elevaciones Laterales',
                'imagen_ejercicio' => 'elevaciones.jpg',
                'categoria_id' => 2,
            ],
            [
                'id' => 9,
                'nombre_ejercicio' => 'Extensiones de Pierna',
                'imagen_ejercicio' => 'leg_extensions.jpg',
                'categoria_id' => 3,
            ],
            [
                'id' => 10,
                'nombre_ejercicio' => 'Sentadilla Libre',
                'imagen_ejercicio' => 'sentadilla.jpg',
                'categoria_id' => 3,
            ],
            [
                'id' => 11,
                'nombre_ejercicio' => 'Sentadilla una Pierna',
                'imagen_ejercicio' => 'sentadilla_una_pierna.jpg',
                'categoria_id' => 3,
            ],
            [
                'id' => 12,
                'nombre_ejercicio' => 'Prensa',
                'imagen_ejercicio' => 'prensa_piernas.jpg',
                'categoria_id' => 3,
            ],
            [
                'id' => 13,
                'nombre_ejercicio' => 'Peso Muerto',
                'imagen_ejercicio' => 'peso_muerto.jpg',
                'categoria_id' => 6,
            ],
            [
                'id' => 14,
                'nombre_ejercicio' => 'Dominadas',
                'imagen_ejercicio' => 'dominadas.jpg',
                'categoria_id' => 6,
            ],
            [
                'id' => 15,
                'nombre_ejercicio' => 'Jalon al Pecho',
                'imagen_ejercicio' => 'jalon_al_pecho.jpg',
                'categoria_id' => 6,
            ],
            [
                'id' => 16,
                'nombre_ejercicio' => 'Remo Gironda',
                'imagen_ejercicio' => 'remo_gironda.jpg',
                'categoria_id' => 6,
            ],
            [
                'id' => 17,
                'nombre_ejercicio' => 'Curl de biceps con barra',
                'imagen_ejercicio' => 'curl_biceps_con_barra.jpg',
                'categoria_id' => 4,
            ],
            [
                'id' => 18,
                'nombre_ejercicio' => 'Curl de biceps',
                'imagen_ejercicio' => 'curl_biceps_con_barra.jpg',
                'categoria_id' => 4,
            ],
            [
                'id' => 19,
                'nombre_ejercicio' => 'Curl de biceps con barra',
                'imagen_ejercicio' => 'curl_biceps.jpg',
                'categoria_id' => 4,
            ],
            [
                'id' => 20,
                'nombre_ejercicio' => 'Martillo Biceps',
                'imagen_ejercicio' => 'martillo_biceps.jpg',
                'categoria_id' => 4,
            ],
            [
                'id' => 21,
                'nombre_ejercicio' => 'Curl biceps sentado',
                'imagen_ejercicio' => 'curl_sentado.jpg',
                'categoria_id' => 4,
            ],
            [
                'id' => 22,
                'nombre_ejercicio' => 'Fondos',
                'imagen_ejercicio' => 'fondos.jpg',
                'categoria_id' => 5,
            ],
            [
                'id' => 23,
                'nombre_ejercicio' => 'Extension de tricpes con cable',
                'imagen_ejercicio' => 'extension_con_cable.jpg',
                'categoria_id' => 5,
            ],
            [
                'id' => 24,
                'nombre_ejercicio' => 'Extension tricpes con mancuerna',
                'imagen_ejercicio' => 'extension_triceps_mancuerna.jpg',
                'categoria_id' => 5,
            ],
            [
                'id' => 25,
                'nombre_ejercicio' => 'Extension triceps',
                'imagen_ejercicio' => 'extension_tricpes.jpg',
                'categoria_id' => 5,
            ],
            [
                'id' => 26,
                'nombre_ejercicio' => 'Plancha lateral',
                'imagen_ejercicio' => 'plancha_lateral.jpg',
                'categoria_id' => 7,
            ],
            [
                'id' => 27,
                'nombre_ejercicio' => 'Plancha Estirada',
                'imagen_ejercicio' => 'plancha_estirada.jpg',
                'categoria_id' => 7,
            ],
            [
                'id' => 28,
                'nombre_ejercicio' => 'Plancha',
                'imagen_ejercicio' => 'plancha.jpg',
                'categoria_id' => 7,
            ],
            [
                'id' => 29,
                'nombre_ejercicio' => 'Abdominales',
                'imagen_ejercicio' => 'abdominales_pierna.jpg',
                'categoria_id' => 7,
            ],
        ];
        ejercicio::insert($ejercicio);
    }
}
