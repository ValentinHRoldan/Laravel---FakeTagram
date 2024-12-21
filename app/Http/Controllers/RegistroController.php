<?php

namespace App\Http\Controllers;

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
        $r->validate([
            'name' => ['required','max:25'],
        ]);
    }
}
