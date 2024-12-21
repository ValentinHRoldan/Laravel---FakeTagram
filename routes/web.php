<?php

use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Route;

// usa un closure o callback

Route::get('/', function () {
    return view('principal');
});


Route::get('/nosotros', function(){
    return view('nosotros');
});

Route::get('/registro', [RegistroController::class, 'index']);
Route::get('/autenticar', [RegistroController::class, 'auntenticar']);
Route::post('/enviar', [RegistroController::class, 'submit']);