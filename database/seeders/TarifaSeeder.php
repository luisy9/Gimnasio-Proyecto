<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tarifa;

class TarifaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tarifa = [
            [
                'tipo_tarifa' => 'TARIFA BASICA',
                'precio' => 19.99,
                'descripcion_tarifa' => 'Horario de 7 a 14, Sin reserva, Acceso a sala de musculación, Mes de apertura gratuito,  Acceso ilimitado',
            ],

            [
                'tipo_tarifa' => 'TARIFA PREMIUM',
                'precio' => 25.70,
                'descripcion_tarifa' => 'Acceso a horario completo Reserva con 48h de antelacion, Planes de entrenamiento online, Acceso a todas las salas, Mes de apertura gratuito, Acceso ilimitado'
            ],
            [
                'tipo_tarifa' => 'TARIFA PRO',
                'precio' => 29.90,
                'descripcion_tarifa' => 'Acceso a horario completo, Reserva con 36h de antelacion, Acceso a sala de musculación, Mes de apertura gratuito, Acceso ilimitado'
            ]
        ];
        tarifa::insert($tarifa);
    }
}
