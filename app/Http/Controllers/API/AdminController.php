<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\role;
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
        // $id =$req->id;
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
        $user->update($input);


        return response()->json(['success' => 'User update successfully']);
    }
}
