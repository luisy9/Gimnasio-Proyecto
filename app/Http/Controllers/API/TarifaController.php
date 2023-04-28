<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tarifa;
use Illuminate\Support\Facades\DB;

class TarifaController extends Controller
{
    public function index()
    {
        $tarifas = tarifa::all()->toArray();
        return $tarifas;
    }

    public function selectTarifas(Request $req){
        $tarifaSeleccionada = tarifa::find($req->id);
        return $tarifaSeleccionada;
    }

    // public function add(Request $request)
    // {


    //     $request->validate([
    //         'name' => 'required',
    //         'description' => 'required',
    //         'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
    //     ]);


    //     $input = $request->all();
    //     $imageName = NULL;


    //     if ($image = $request->file('file')) {
    //         $destinationPath = 'img/';
    //         $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
    //         $image->move($destinationPath, $imageName);
    //         $input['image'] = $imageName;
    //     }


    //     Post::create($input);


    //     return response()->json(['success' => 'Post creado correctamente.']);
    // }
}
