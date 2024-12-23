<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Route;

// usa un closure o callback

Route::get('/', function () {
    return view('principal');
});


Route::get('/nosotros', function(){
    return view('nosotros');
});

Route::get('/registro', [RegistroController::class, 'index'])->name('registro');
Route::post('/registro', [RegistroController::class, 'store'])->name('registro');
Route::get('/autenticar', [RegistroController::class, 'auntenticar']);

Route::get('/muro', [PostController::class, 'index'])->name('post.index');