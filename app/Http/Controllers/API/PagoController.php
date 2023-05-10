<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        $facturaSelect = facturas::find($id);
        $facturasTarifa = $facturaSelect->tarifa_id;
        $tarifaActual = tarifa::find($facturasTarifa);
        return $tarifaActual;
    }

    public function bajaFactura($id)
    {

        $factura = facturas::find($id);
        $factura->delete();
        return response()->json(['success' => 'Dado de baja correctamente']);
    }


    public function isMembership($id)
    {
        $isMember = facturas::where('user_id', $id)->get();
        return $isMember;
    }
}
