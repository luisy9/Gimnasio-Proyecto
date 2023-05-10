<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\role;
use Illuminate\Support\Facades\Session;
use App\Models\facturas;

class UserController extends Controller
{
    public function login(Request $req)
    {
        $credentials = [
            'email' => $req->email,
            'password' => $req->password
        ];

        if (Auth::attempt($credentials)) {
            $success = true;
            $message = "Usuario logeado correctamente";
        } else {
            $success = false;
            $message = "Usuario no autorizado";
        }

        $response = [
            'success' => $success,
            'message' => $message
        ];

        return response()->json($response);
    }

    public function register(Request $req)
    {
        try {
            $user = new User();
            $user->name = $req->name;
            $user->email = $req->email;
            $user->password = Hash::make($req->password);
            $user->fecha_nacimiento = $req->fecha_nacimiento;
            $user->save();

            $role_default = role::where('nombre_role', 'default_user')->get();

            // DB::insert('insert into rolesusuarios (user_id, role_id) values ('.$user->id.', '.$role_default->id.')');
            //DB::insert('insert into rolesusuarios (user_id, role_id) values ('.$user->id.', '.$role_default->id.')');
            // $role_id = $role_default->id;
            // return $role_default;
            // $test->roles()->attach($role_default->id);
            // $arrayRoles = $req->checked;
            $user->roles()->sync(2);

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

    public function logout(Request $req)
    {
        try {
            Session::flush();

            $success = true;
            $message = "Logout correcto";
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

    public function store(Request $req)
    {
        return $req->all();
    }

    public function selectUser(Request $req)
    {
        $userSelecionado = User::find($req->id);
        return $userSelecionado;
    }

    public function changeTarifa($idTarifa, $idUser, $nombre_completo, $numero_tarjeta,Request $req)
    {
       
        try {
            $factura = facturas::where('user_id', $idUser)->get();
            DB::delete('delete from facturas where user_id = ?',[$idUser]);
            $factura = new facturas();
            $factura->nombre_completo = $req->nombre_completo;
            $factura->numero_tarjeta = $req->numero_tarjeta;
            $factura->user_id = $idUser;
            $factura->tarifa_id = $idTarifa;
            $factura->save();
            $success = true;
            $message = "Cambio de tarifa correctamente";
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        $response = [
            'success' => $success,
            'message' => $message,
        ];

        return response()->json(['success' => 'Cambio de tarifa correctamente']);
    }
}
