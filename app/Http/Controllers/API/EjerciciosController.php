<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categoria;
use Illuminate\Support\Facades\DB;

class EjerciciosController extends Controller
{
   public function categorias(){
    $categorias = categoria::all()->toArray();
    return $categorias;
   }

}
