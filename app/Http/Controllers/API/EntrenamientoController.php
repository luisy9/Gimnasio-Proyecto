<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categoria;
use App\Models\ejercicio;
use App\Models\facturas;
use Illuminate\Support\Facades\DB;

class EntrenamientoController extends Controller
{
    public function showCategorias(Request $req)
    {
        $categoria = categoria::all()->toArray();
        return $categoria;
    }

    public function musculitosCategoria($idcategoria)
    {
        $musculito = ejercicio::where('categoria_id', $idcategoria)->get();
        return $musculito;
    }

    public function categoria($idcategoria)
    {
        $categoria = categoria::find($idcategoria);
        return $categoria;
    }

    public function isPro($iduser)
    {
        // $isPro = facturas::where('user_id', $iduser)->get();
        // DB::delete('delete from tarifas where id = ?', [$id]);
        $isPro = DB::table('facturas')
            ->where('user_id', $iduser)
            ->where('tarifa_id', 3)
            ->get();

        return $isPro;
    }

}
