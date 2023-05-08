<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tarifa;
use Illuminate\Support\Facades\DB;

class TarifaController extends Controller
{
    public function index()
    {
        $tarifas = tarifa::all()->toArray();
        return $tarifas;
    }

    public function selectTarifas(Request $req){
        $tarifaSeleccionada = tarifa::find($req->id);
        return $tarifaSeleccionada;
    }

}
