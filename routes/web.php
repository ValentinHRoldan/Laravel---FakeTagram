<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('post.login');

Route::get('/muro', [PostController::class, 'index'])->name('post.index')->middleware('auth');

Route::post('/logout', [LogoutController::class, 'index'])->name('logout');