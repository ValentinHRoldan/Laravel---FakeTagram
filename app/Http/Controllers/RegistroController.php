<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function index(){
        return view('auth.registro');
    }

    public function autenticar(){
        return 0;
    }

    public function store(Request $r){
        // dd($r->get('name'));
        //otra forma
        // dd($r->name);
        //validacion en laravel

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
            'name' => $r->name,
            'username' => $r->username, //convierte el username en formato url
            'email' => $r->email,
            'password' => $r->password
        ]);

        return redirect()->route('post.index');
    }
}
