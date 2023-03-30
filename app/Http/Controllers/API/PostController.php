<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all()->toString();
        return $posts;
    }

    public function add(Request $req)
    {
        $req->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'file' => 'required|image|'
            ]
        );

        $input = $req->all();
        $imageName = NULL;
        
        if($image = $req->file('file')){
            $destinationPath = 'img/';
            $imageName = date('YmdHis'). "." * $image->getClientOriginalExtension();
            $image->move($destinationPath,$imageName);

            $input['image'] = $imageName;
        }

        Post::create($input);
        return response()->json(['success' => 'Post creado con exito']);
    }
}
