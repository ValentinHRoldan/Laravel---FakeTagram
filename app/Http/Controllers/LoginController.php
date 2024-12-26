<?php

namespace App\Http\Controllers;

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
        return redirect()->route('post.index');
    }
}
