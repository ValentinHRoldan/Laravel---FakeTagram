<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(User $user){
        return view('auth.dashboard', [
            'user' => $user
        ]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $r){
        $r->validate([
            'titulo' => 'required|max:20',
            'descripcion' => 'required|max:500',
            'imagen' => 'required',
        ]);

        //subiendo a la bd
        // Post::create([
        //     'titulo' => $r->titulo,
        //     'descripcion' => $r->descripcion,
        //     'imagen' => $r->imagen,
        //     'user_id' => Auth::user()->id,
        // ]);
        //otra forma de añadir registros
        $post = new Post;
        $post->titulo = $r->titulo;
        $post->descripcion = $r->descripcion;
        $post->imagen = $r->imagen;
        $post->user_id = Auth::user()->id;
        $post->save();

        return redirect()->route('post.index', Auth::user()->username);
    }
}
