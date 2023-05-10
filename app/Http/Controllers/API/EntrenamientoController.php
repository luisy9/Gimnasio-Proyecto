<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categoria;

class EntrenamientoController extends Controller
{
    public function showCategorias(Request $req){
        $categoria = categoria::all()->toArray();
        return $categoria;
    }
   
}
