<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\role;
use App\Models\User;

class RoleController extends Controller
{

    public function selectRoles(Request $req)
    {
        $RoleSeleccionada = role::find($req->id);
        return $RoleSeleccionada;
    }

    public function allRoles()
    {
        $roles = role::all()->toArray();
        return $roles;
    }

    public function roleDelete($id)
    {
        $role = role::findOrFail($id);
        $role->delete();
        return response()->json(['success' => 'User deleted successfully']);
    }
}
