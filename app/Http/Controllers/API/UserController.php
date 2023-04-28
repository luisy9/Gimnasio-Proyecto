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

            $role_default = role::where('nombre_role','default_user')->get();

            // DB::insert('insert into rolesusuarios (user_id, role_id) values ('.$user->id.', '.$role_default->id.')');
            //DB::insert('insert into rolesusuarios (user_id, role_id) values ('.$user->id.', '.$role_default->id.')');
            // $role_id = $role_default->id;
            // return $role_default;
            // $test->roles()->attach($role_default->id);
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
}
