<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{

    public function index(User $user){
        return view('perfil.followers', [
            'user' => $user
        ]);
    }

    public function store(User $user){
        $user->followers()->attach(Auth::user()->id);
        return back();
    }

    public function destroy(User $user){
        $user->followers()->detach(Auth::user()->id);
        return back();
    }

    public function followingsView(User $user){
        return view('perfil.followings', [
            'user' => $user
        ]);
    }
}
