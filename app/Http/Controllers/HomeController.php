<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __invoke()
    {
        //obtener el id de personas que seguimos
        $IdSiguiendo = Auth::user()->followings->pluck('id')->toArray();
        //obtener los posts de personas a las que seguimos
        $posts = Post::whereIn('user_id', $IdSiguiendo)->latest()->paginate(20);
        $users = User::paginate(10);

        return view('home', [
            'posts' => $posts,
            'users' => $users
        ]);
    }

    public function users(){
        return view('users');
    }
}
