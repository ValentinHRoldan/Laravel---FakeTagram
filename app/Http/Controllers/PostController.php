<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(User $user){
        //si como parametro tenemos una variable sola, esto significa que se está recibiendo el nombre del usuario que indicamos en la url en el archivo de rutas
        //si como parametro tenemos User $user estamos haciendo uso del route model binding de laravel, esto indica que laravel automaticamente busca en la base de datos con el nombre de usuario recibido del archivo de rutas

        $postsUser = Post::where('user_id', $user->id)->paginate(8);
        //tambien se puede hacer asi:
        // $postsUser = $user->posts()->paginate(8);
        return view('auth.dashboard', [
            'user' => $user,
            'posts' => $postsUser
        ]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $r){
        $r->validate([
            'titulo' => 'required|max:50',
            'descripcion' => 'max:500',
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
        // $post = new Post;
        // $post->titulo = $r->titulo;
        // $post->descripcion = $r->descripcion;
        // $post->imagen = $r->imagen;
        // $post->user_id = Auth::user()->id;
        // $post->save();

        //otra forma
        $r->user()->posts()->create([
            'titulo' => $r->titulo,
            'descripcion' => $r->descripcion,
            'imagen' => $r->imagen,
            'user_id' => Auth::user()->id,            
        ]);

        return redirect()->route('post.index', Auth::user()->username);
    }

    public function show(User $user, Post $post){
        return view('posts.show', [
            'post' => $post,
            'user' => $user
        ]);
    }
}
