<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login(Request $req)
    {
        $credentials = [
            'email' => $req->email,
            'password' => $req->password
        ];


        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $success = true;
            $message = "Usuario logeado correctamente";
            if ($success && $user->rol == 'admin') {
                $message = "Usuario " . $user->rol;
            }
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
            $user->nombre = $req->nombre;
            $user->Apellido = $req->Apellido;
            $user->email = $req->email;
            $user->DNI = $req->DNI;
            $user->password = Hash::make($req->password);
            $user->fecha_nacimiento = $req->fecha_nacimiento;
            $user->id_role = $req->id_role;
            $user->save();

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
}
