<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\role;

class RoleController extends Controller
{

    public function selectRoles(Request $req){
        $RoleSeleccionada = role::find($req->id);
        return $RoleSeleccionada;
    }
}