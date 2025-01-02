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
            'email' => 'required',
            'password' => 'required'
        ]);
        $emailRegex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        //nos logueamos, en caso contrario mostramos el mensaje de credenciales incorrectas
        //acá verificamos mediante una expresion regular si es un correo o un nombre de usuario
        if(preg_match($emailRegex, $r->email) && Auth::attempt([
            'email' => $r->email,
            'password' => $r->password
            ],
            $r->remember)){
                return redirect()->route('post.index', Auth::user());
        }
        else{
            if(Auth::attempt([
                'username' => $r->email,
                'password' => $r->password
                ],
                $r->remember)){
                    return redirect()->route('post.index', Auth::user());
                     
                }
        }
        

        return back()->with('mensaje', 'credenciales incorrectas');
        // $user = User::where('email', $r->email)->first();
        //traer al usuario de la base de datos
    }
}
