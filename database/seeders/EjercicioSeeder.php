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
                'imagen_ejercicio' => 'press_banca.webp',
                'descripcion_ejercicio' => 'El press de banca, press de pecho, fuerza en banco, fuerza acostado o press banca, es un ejercicio de peso libre que trabaja principalmente la zona superior del cuerpo',
                'categoria_id' => 1,
            ],
            [
                'id' => 2,
                'nombre_ejercicio' => 'Press Inclinado',
                'imagen_ejercicio' => 'press_inclinado.webp',
                'descripcion_ejercicio' => 'Con referencia a su nombre, el press inclinado se enfoca en la parte superior del pecho, mayormente en la parte de arriba del pectoral mayor',
                'categoria_id' => 1,
            ],
            [
                'id' => 3,
                'nombre_ejercicio' => 'Flies',
                'imagen_ejercicio' => 'flies.webp',
                'descripcion_ejercicio' => 'Es un ejercicio que se puede realizar con dos poleas, este ejercicio es para pecho y segun la altura de las poleas se puede trabajar una parte de el pecho o otra, el ejecicio se realiza haciando una contraccion del pectoral con las poleas',
                'categoria_id' => 1,
            ],
            [
                'id' => 4,
                'nombre_ejercicio' => 'Press Maquina',
                'imagen_ejercicio' => 'press_maquina.webp',
                'descripcion_ejercicio' => 'Se realiza una contraccion del musculo mediante una maquina',
                'categoria_id' => 1,
            ],
            [
                'id' => 5,
                'nombre_ejercicio' => 'Press Militar',
                'imagen_ejercicio' => 'press_maquina_h.webp',
                'descripcion_ejercicio' => 'El press militar es un ejercicio compuesto en el que participa todo el cuerpo. No solo los brazos y hombros, que empujan y levantan el peso. También las piernas y el tronco ejercen presión de forma isométrica.',
                'categoria_id' => 2,
            ],
            [
                'id' => 6,
                'nombre_ejercicio' => 'Hombro Posterior',
                'imagen_ejercicio' => 'hombro_posterior.webp',
                'descripcion_ejercicio' => 'Se realiza en un banco sentado, apollando el pecho sobre las piernas y con una mancuerna a cada mano se hace una elevacion lateral hacia afuera, enfocando el peso en la parta posterior del hombro',
                'categoria_id' => 2,
            ],
            [
                'id' => 7,
                'nombre_ejercicio' => 'Press Militar Libre',
                'imagen_ejercicio' => 'press_militar_libre.webp',
                'descripcion_ejercicio' => 'El press militar es un ejercicio compuesto en el que participa todo el cuerpo. No solo los brazos y hombros, que empujan y levantan el peso. También las piernas y el tronco ejercen presión de forma isométrica.',
                'categoria_id' => 2,
            ],
            [
                'id' => 8,
                'nombre_ejercicio' => 'Elevaciones Laterales',
                'imagen_ejercicio' => 'elevaciones.webp',
                'descripcion_ejercicio' => 'Con una mancuerna en cada mano se realiza una elevacion de los brazoa hacia afuera enfocando el peso en la parte lateral del hombro',
                'categoria_id' => 2,
            ],
            [
                'id' => 9,
                'nombre_ejercicio' => 'Extensiones de Pierna',
                'imagen_ejercicio' => 'leg_extensions.webp',
                'descripcion_ejercicio' => 'Las extensiones de pierna se realizan en maquina, y se realizan en una silla sentado, haciando una elevacion de las piernas en una palanca',
                'categoria_id' => 3,
            ],
            [
                'id' => 10,
                'nombre_ejercicio' => 'Sentadilla Libre',
                'imagen_ejercicio' => 'sentadilla.webp',
                'descripcion_ejercicio' => 'Es la sentadilla comúnmente realizada en powerlifting. Sitúa la barra más abajo en nuestra espalda (sobre nuestro hombro posterior). El movimiento es muy similar a el de sentarse en una silla',
                'categoria_id' => 3,
            ],
            [
                'id' => 11,
                'nombre_ejercicio' => 'Sentadilla una Pierna',
                'imagen_ejercicio' => 'sentadilla_una_pierna.webp',
                'descripcion_ejercicio' => 'Es la sentadilla pero con una sola pierna, normalmente la otra pierna se apoya en un banco, y el movimiento es muy similar al sentarse una silla',
                'categoria_id' => 3,
            ],
            [
                'id' => 12,
                'nombre_ejercicio' => 'Prensa',
                'imagen_ejercicio' => 'prensa_piernas.webp',
                'descripcion_ejercicio' => 'La prensa del gym es una máquina que se basa en el movimiento de empuje para desarrollar la fuerza y resistencia de los cuádriceps y los gemelos, los músculos que le dan volumen a tus piernas. El aparato consiste en un asiento con posición fija y un respaldo con una ligera inclinación',
                'categoria_id' => 3,
            ],
            [
                'id' => 13,
                'nombre_ejercicio' => 'Peso Muerto',
                'imagen_ejercicio' => 'peso_muerto.webp',
                'descripcion_ejercicio' => 'El peso muerto es un ejercicio con pesas que consiste en levantar una barra desde el suelo hasta la cintura. El peso muerto es uno de los tres movimientos que forman parte del powerlifting',
                'categoria_id' => 6,
            ],
            [
                'id' => 14,
                'nombre_ejercicio' => 'Dominadas',
                'imagen_ejercicio' => 'dominadas.webp',
                'descripcion_ejercicio' => 'Se denomina dominada a un ejercicio de calistenia cuya ejecución consiste en levantar el cuerpo mientras este pende de una barra de dominadas.',
                'categoria_id' => 6,
            ],
            [
                'id' => 15,
                'nombre_ejercicio' => 'Jalon al Pecho',
                'imagen_ejercicio' => 'jalon_al_pecho.webp',
                'descripcion_ejercicio' => 'Con referencia a su nombre, el press inclinado se enfoca en la parte superior del pecho, mayormente en la parte de arriba del pectoral mayor',
                'categoria_id' => 6,
            ],
            [
                'id' => 16,
                'nombre_ejercicio' => 'Remo Gironda',
                'imagen_ejercicio' => 'remo_gironda.webp',
                'descripcion_ejercicio' => ' Se trata de un banco de pesas donde debes adoptar una posición similar a la de un bote de remo olímpico, donde te colocas sentado con los pies apoyados en una superficie frontal y con las manos agarras la polea con la que harás un movimiento de tracción o tirón.',
                'categoria_id' => 6,
            ],
            [
                'id' => 17,
                'nombre_ejercicio' => 'Curl de biceps con barra',
                'imagen_ejercicio' => 'curl_biceps_con_barra.webp',
                'descripcion_ejercicio' => 'Para ejecutarlo tomamos la barra, pegamos los codos a los costados de nuestro cuerpo y tiramos los codos hacia atrás y debemos subir el peso y bajarlo lentamente hasta estirar el brazo completamente. Es un excelente ejercicio porque permite añadir mucho peso y completar más serie con ayuda.',
                'categoria_id' => 4,
            ],
            [
                'id' => 18,
                'nombre_ejercicio' => 'Curl de biceps',
                'imagen_ejercicio' => 'curl_biceps.webp',
                'descripcion_ejercicio' => 'Curl de bíceps son los ejercicios que implican la ejercitación de dicho músculo. Como el bíceps trabaja en el giro de muñeca o contracción del brazo, es fácil inducir que los diferentes tipos de curls incluyan flexiones de brazos así como giros de muñeca.',
                'categoria_id' => 4,
            ],
            [
                'id' => 19,
                'nombre_ejercicio' => 'Curl de biceps con barra Z',
                'imagen_ejercicio' => 'curl_biceps_z.webp',
                'descripcion_ejercicio' => 'Para ejecutarlo tomamos la barra en z, pegamos los codos a los costados de nuestro cuerpo y tiramos los codos hacia atrás y debemos subir el peso y bajarlo lentamente hasta estirar el brazo completamente. Es un excelente ejercicio porque permite añadir mucho peso y completar más serie con ayuda.',
                'categoria_id' => 4,
            ],
            [
                'id' => 20,
                'nombre_ejercicio' => 'Martillo Biceps',
                'imagen_ejercicio' => 'martillo_biceps.webp',
                'descripcion_ejercicio' => 'Con referencia a su nombre, el press inclinado se enfoca en la parte superior del pecho, mayormente en la parte de arriba del pectoral mayor',
                'categoria_id' => 4,
            ],
            [
                'id' => 21,
                'nombre_ejercicio' => 'Curl biceps sentado',
                'imagen_ejercicio' => 'curl_sentado.webp',
                'descripcion_ejercicio' => 'Con referencia a su nombre, el press inclinado se enfoca en la parte superior del pecho, mayormente en la parte de arriba del pectoral mayor',
                'categoria_id' => 4,
            ],
            [
                'id' => 22,
                'nombre_ejercicio' => 'Fondos',
                'imagen_ejercicio' => 'fondos.webp',
                'descripcion_ejercicio' => 'Con referencia a su nombre, el press inclinado se enfoca en la parte superior del pecho, mayormente en la parte de arriba del pectoral mayor',
                'categoria_id' => 5,
            ],
            [
                'id' => 23,
                'nombre_ejercicio' => 'Extension de tricpes con cable',
                'imagen_ejercicio' => 'extension_con_cable.webp',
                'descripcion_ejercicio' => 'Con referencia a su nombre, el press inclinado se enfoca en la parte superior del pecho, mayormente en la parte de arriba del pectoral mayor',
                'categoria_id' => 5,
            ],
            [
                'id' => 24,
                'nombre_ejercicio' => 'Extension tricpes con mancuerna',
                'imagen_ejercicio' => 'extension_triceps_mancuerna.webp',
                'descripcion_ejercicio' => 'Con referencia a su nombre, el press inclinado se enfoca en la parte superior del pecho, mayormente en la parte de arriba del pectoral mayor',
                'categoria_id' => 5,
            ],
            [
                'id' => 25,
                'nombre_ejercicio' => 'Extension triceps',
                'imagen_ejercicio' => 'extension_tricpes.webp',
                'descripcion_ejercicio' => 'Con referencia a su nombre, el press inclinado se enfoca en la parte superior del pecho, mayormente en la parte de arriba del pectoral mayor',
                'categoria_id' => 5,
            ],
            [
                'id' => 26,
                'nombre_ejercicio' => 'Plancha lateral',
                'imagen_ejercicio' => 'plancha_lateral.webp',
                'descripcion_ejercicio' => 'Con referencia a su nombre, el press inclinado se enfoca en la parte superior del pecho, mayormente en la parte de arriba del pectoral mayor',
                'categoria_id' => 7,
            ],
            [
                'id' => 27,
                'nombre_ejercicio' => 'Plancha Estirada',
                'imagen_ejercicio' => 'plancha_estirada.webp',
                'descripcion_ejercicio' => 'Con referencia a su nombre, el press inclinado se enfoca en la parte superior del pecho, mayormente en la parte de arriba del pectoral mayor',
                'categoria_id' => 7,
            ],
            [
                'id' => 28,
                'nombre_ejercicio' => 'Plancha',
                'imagen_ejercicio' => 'plancha.webp',
                'descripcion_ejercicio' => 'Con referencia a su nombre, el press inclinado se enfoca en la parte superior del pecho, mayormente en la parte de arriba del pectoral mayor',
                'categoria_id' => 7,
            ],
            [
                'id' => 29,
                'nombre_ejercicio' => 'Abdominales Pierna',
                'imagen_ejercicio' => 'abdominales_pierna.webp',
                'descripcion_ejercicio' => 'Con referencia a su nombre, el press inclinado se enfoca en la parte superior del pecho, mayormente en la parte de arriba del pectoral mayor',
                'categoria_id' => 7,
            ],
        ];
        ejercicio::insert($ejercicio);
    }
}
