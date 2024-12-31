<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $r){
        $r->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!Auth::attempt(['email' => $r->email, 'password' => $r->password], $r->remember)){
            return back()->with('mensaje', 'credenciales incorrectas');
        }

        // $user = User::where('email', $r->email)->first();
        //traer al usuario de la base de datos
        return redirect()->route('post.index', Auth::user());
    }
}
