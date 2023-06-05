<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categoria;
use App\Models\ejercicio;
use App\Models\rutina_users;
use Illuminate\Support\Facades\DB;

class EjerciciosController extends Controller
{
   public function categorias(){
    $categorias = categoria::all()->toArray();
    return $categorias;
   }

   public function crearEjercicios(){
      
   }

   public function getImg($nombre_ejercicio){

      $imgEjercicio = ejercicio::where('nombre_ejercicio', $nombre_ejercicio)->get();
      return $imgEjercicio;
   }

   public function showRutina($id_rutina){
      $rutina_user = rutina_users::where('id_rutina', $id_rutina)->get();
      return $rutina_user;
   }

   public function RutinaPrintUpdate($idUser,$id_rutina){
      $ejercicio_user = rutina_users::where('id_rutina', $id_rutina)
      ->where('user_id', $idUser)->get();
      return $ejercicio_user;
   }

   public function imagenEjercicio($ejercicio){
      $imagen = ejercicio::where('nombre_ejercicio', $ejercicio)->get();
      return $imagen;
   }

   public function deleteRutinaAnterior($id_rutina){
      $deleteRutina = rutina_users::where('id_rutina', $id_rutina)->delete();
   }

}
