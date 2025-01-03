<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function store(User $user, Post $post, Request $r){
        $r->validate([
            'comentario' => 'required|max:250'
        ]);

        Comentario::create([
            'user_id' => Auth::user()->id,
            'post_id' => $post->id,
            'comentario' => $r->comentario
        ]);
        return back()->with('mensaje', 'comentario realizado con exito!');
    }
}
