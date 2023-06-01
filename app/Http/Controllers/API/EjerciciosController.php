<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categoria;
use App\Models\ejercicio;
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

}
