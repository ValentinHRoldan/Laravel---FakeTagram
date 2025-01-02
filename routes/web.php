<?php

use App\Http\Controllers\ImagenController;
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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('post.login');

Route::post('/logout', [LogoutController::class, 'index'])->name('logout');

//entre llave va el nombre del modelo, en este caso el modelo User
//Route Model Binding
Route::get('/{user:username}', [PostController::class, 'index'])->name('post.index')->middleware('auth');
//con user usaremos el id de la bd, con user:username usaremos el nombre de usuario

Route::get('/post/create', [PostController::class, 'create'])->name('post.create')->middleware('auth');

Route::post('/imagen', [ImagenController::class, 'store'])->name('imagen.post');

Route::post('/posts', [PostController::class, 'store'])->name('post.store');

Route::get('/{user:username}/post/{post}', [PostController::class, 'show'])->name('post.show');