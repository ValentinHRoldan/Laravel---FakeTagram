<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistroController extends Controller
{
    public function index(){
        return view('auth.registro');
    }

    public function autenticar(){
        return 0;
    }

    public function store(Request $r){
        //convierte el nombre de usuario en formato de link
        //ej: Si Valentin Roldan -> valentin-roldan
        $r->request->add([
            'username' => Str::slug($r->username)
        ]);

        $r->validate([
            'name' => ['required','max:25'],
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:50',
            'password' => 'required|confirmed|min:5',
            'password_confirmation' => 'required'
        ]);



        User::create([
            // 'name' => $r.get('name');
            'name' => $r->name,
            'username' => $r->username, //convierte el username en formato url
            'email' => $r->email,
            'password' => $r->password,
        ]);

        //autenticar usuario
        Auth::attempt([
            'email' => $r->email,
            'password' => $r->password
        ]);

        //otra forma de autenticar

        // Auth::attempt($r->only('email', 'password'));


        //redireccion
        // $user = User::where('email', $r->email)->first();
        return redirect()->route('post.index', [
            'user' => Auth::user()->username
        ]);
    }
}
