<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\role;
use App\Models\tarifa;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function addUser(Request $req)
    {
        try {
            $user = new User();
            $user->name = $req->name;
            $user->email = $req->email;
            $user->password = Hash::make($req->password);
            $user->fecha_nacimiento = $req->fecha_nacimiento;
            $user->save();

            $role_default = role::where('nombre_role', 'default_user')->get();
            $arrayRoles = $req->checked;
            $user->roles()->sync($arrayRoles);

            // return $user->roles;


            $success = true;
            $message = "Usuario registrado correctamente";
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

    public function allUsers(Request $req)
    {
        $users = User::all()->toArray();
        return $users;
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->roles()->detach();
        $user->delete();
        return response()->json(['success' => 'User deleted successfully']);
    }

    public function updateUsers($id, Request $request)
    {
        $user = User::find($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'fecha_nacimiento' => 'required'
        ]);

        $input = $request->all();
        $input["password"] = Hash::make($request->password);
        $user->update($input);


        return response()->json(['success' => 'User update successfully']);
    }

    public function userRoles($id, Request $req)
    {
    }

    public function addTarifas(Request $req)
    {
        try {
            $tarifa = new tarifa();
            $tarifa->tipo_tarifa = $req->tipo_tarifa;
            $tarifa->precio = $req->precio;
            $tarifa->descripcion_tarifa = $req->descripcion_tarifa;
            $tarifa->save();


            $success = true;
            $message = "Tarifa añadida correctamente";
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

    public function deleteTarifas($id)
    {
        DB::delete('delete from tarifas where id = ?', [$id]);
        DB::delete('delete from facturas where tarifa_id ? '[$id]);
        return response()->json(['success' => 'Tarifa deleted successfully']);
    }


    public function showUser($id)
    {
        $users = User::find($id);
        return $users;
    }

    public function newTarifas(Request $req)
    {
        try {
            $tarifa = new tarifa();
            $tarifa->tipo_tarifa = $req->tipo_tarifa;
            $tarifa->precio = $req->precio;
            $tarifa->descripcion_tarifa = $req->descripcion_tarifa;
            $tarifa->save();

            $success = true;
            $message = "Tarifa añadida correctamente";
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

    public function showTarifa($idtarifa)
    {
        $tarifas = tarifa::findOrFail($idtarifa);
        return $tarifas;
    }

    public function updatetarifa(Request $req, $idtarifa)
    {
        $tarifa = tarifa::find($idtarifa);
        $req->validate([
            'tipo_tarifa' => 'required',
            'precio' => 'required',
            'descripcion_tarifa' => 'required'
        ]);

        $input = $req->all();
        $tarifa->update($input);
        return response()->json(['success' => 'Tarifa update successfully']);
    }
}
