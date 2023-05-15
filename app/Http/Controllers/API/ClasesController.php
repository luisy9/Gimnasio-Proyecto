<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\clase;
use App\Models\usersClase;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClasesController extends Controller
{

    public function clases(Request $req)
    {
        $clases = clase::all()->toArray();
        return $clases;
    }

    public function clasesSelect(Request $req, $idclase)
    {
        $clasesSelect = clase::find($idclase);
        return $clasesSelect;
    }

    public function unirseClase(Request $req, $iduser, $idclase)
    {
        try {
            $clase_user = new usersClase();
            $clase_user->user_id = $iduser;
            $clase_user->clase_id = $idclase;
            $clase_user->fecha_clase = $req->fecha_clase;
            $clase_user->hora_clase = $req->hora_clase;
            $clase_user->save();

            $clase_user->save();

            $success = true;
            $message = "Usuario añadido a la clase correctamente";
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

    public function numClases(Request $req, $iduser)
    {
        $numUsers = DB::table('usuario_clase')->where('user_id', $iduser)->count('user_id');
        return  $numUsers;
    }

    public function hasClases(Request $req, $iduser)
    {
        $tieneClases = usersClase::where('user_id', $iduser)->get();
        return $tieneClases;
    }

    public function deleteClases($id)
    {
        DB::table('usuario_clase')->where('id', $id)->delete();
        return response()->json(['success' => 'User deleted successfully']);
    }
}
