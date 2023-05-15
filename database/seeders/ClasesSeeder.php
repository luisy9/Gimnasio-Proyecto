<?php

namespace Database\Seeders;

use App\Models\clase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $clase = [
            [
                'id' => 1,
                'nombre_clase' => 'Clase de Spinning',
                'descripcion' => 'El spinning consiste en la realización de ejercicios sobre la bicicleta, compaginándolos con la música y efectuando coreografías',
                'imagen' => 'spinning.jpg',
            ],
            [
                'id' => 2,
                'nombre_clase' => 'Clase de Body Pump',
                'descripcion' => 'El Body Pump es un programa de entrenamiento físico intenso que combina actividad aeróbica y trabajo muscular mediante el levantamiento de pesas al ritmo de la música.',
                'imagen' => 'body_pump.jpg',
            ],
            [
                'id' => 3,
                'nombre_clase' => 'Clase de Yoga',
                'descripcion' => 'El yoga es una práctica que conecta el cuerpo, la respiración y la mente.',
                'imagen' => 'yoga.jpg',
            ],
            [
                'id' => 4,
                'nombre_clase' => 'Clase de Crossfit',
                'descripcion' => 'sistema de entrenamiento de fuerza y acondicionamiento basado en ejercicios funcionales constantemente variados realizados a una alta intensidad.',
                'imagen' => 'cross_fit.jpg',
            ],
            [
                'id' => 5,
                'nombre_clase' => 'Clase de Zumba',
                'descripcion' => 'Zumba es una disciplina deportiva que se imparte en clases dirigidas en la que se realizan ejercicios aeróbicos al ritmo de música latina',
                'imagen' => 'zumba.jpg',
            ],
            [
                'id' => 6,
                'nombre_clase' => 'Clase de Full Combat',
                'descripcion' => 'Ejericios de alta intensidad, estas clases son unicas en este gimnasion, ven a probarlas!',
                'imagen' => 'fullcombar.jpg',
            ],


        ];
        clase::insert($clase);
    }
}
