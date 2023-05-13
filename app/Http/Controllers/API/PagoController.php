<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\facturas;
use App\Models\tarifa;

class PagoController extends Controller
{

    public function pagoFactura($idTarifa, $idUser, Request $req)
    {
        try {
            
            $factura = new facturas();
            $factura->nombre_completo = $req->nombre_completo;
            $factura->numero_tarjeta = $req->numero_tarjeta;
            $factura->user_id = $idUser;
            $factura->tarifa_id = $idTarifa;
            $factura->save();

            $success = true;
            $message = "Factura creada correctamente";
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

    public function selectPagoTarifa($id)
    {
        $facturaSelect = facturas::where('user_id', $id)->get();
        // return $facturaSelect;
        $facturasTarifa = $facturaSelect[0]->tarifa_id;
        $tarifaActual = tarifa::find($facturasTarifa);
        return $tarifaActual;
    }

    public function bajaFactura($id)
    {
        DB::delete('delete from facturas where user_id = ?', [$id]);
        DB::delete('delete from rutina_users where user_id = ?', [$id]);
        return response()->json(['success' => 'Dado de baja correctamente']);
    }


    public function isMembership($id)
    {
        $isMember = facturas::where('user_id', $id)->get();
        return $isMember;
    }
}
