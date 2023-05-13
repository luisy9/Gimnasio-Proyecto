<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categoria;
use App\Models\ejercicio;
use App\Models\facturas;
use App\Models\rutina_users;
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

    public function createRutina($userid, Request $req)
    {
        try {
            $rutina = new rutina_users();
            $rutina->nombre_rutina = $req->nombre_rutina;
            $rutina->dia_semana = $req->dia_semana;
            $rutina->ejercicios = $req->ejercicios;
            $rutina->user_id = $userid;
            $rutina->save();

            $rutina->save();

            $success = true;
            $message = "Rutina añadida correctamente";
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }


        $response = [
            'success' => $success,
            'message' => $message,
        ];

        return response()->json($response);
    }

    public function search(Request $req, $nombre)
    {
        $ejercicios = ejercicio::where('nombre_ejercicio', 'LIKE', '%' .  $nombre . '%')->get();

        return response()->json($ejercicios);
    }

    public function hasTarifa($iduser){
        $rutina_users = rutina_users::where('user_id', $iduser)->get();
        return $rutina_users;
    }

    public function deleteEjericicio(){
        
    }
}
