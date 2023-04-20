<?php

// namespace App\Http\Controllers\API;

// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Foundation\Validation\ValidatesRequests;
// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Models\User;
// use App\Models\usuarios;
// use Illuminate\Console\View\Components\Task;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Auth;
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            if ($success && $user->id_role == 1) {
                $message = "Usuario " . $user->id_role;
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
            $user->rol = $req->rol;
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
        // $input = $req->all();
        // usuarios::create($input);
        // return response()->json(['success' => 'Post creado correctamente.']);
    }

    public function logout(Request $req)
    {
        return "Hola logout";
    }

    public function store(Request $req)
    {
        return $req->all();
    }
}
