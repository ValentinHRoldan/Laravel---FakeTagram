<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
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
Route::post('/login', [LoginController::class, 'store'])->name('login.post');

Route::post('/logout', [LogoutController::class, 'index'])->name('logout');

//entre llave va el nombre del modelo, en este caso el modelo User
//Route Model Binding
Route::get('/{user:username}', [PostController::class, 'index'])->name('post.index');
//con user usaremos el id de la bd, con user:username usaremos el nombre de usuario

Route::get('/post/create', [PostController::class, 'create'])->name('post.create')->middleware('auth');

Route::post('/imagen', [ImagenController::class, 'store'])->name('imagen.post');

Route::post('/posts', [PostController::class, 'store'])->name('post.store');

Route::get('/{user:username}/post/{post}', [PostController::class, 'show'])->name('post.show');

Route::post('/{user:username}/post/{post}', [ComentarioController::class, 'store'])->name('comentario.store');

Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::delete('post/comentario/{comentario}', [ComentarioController::class, 'destroy'])->name('comentario.destroy');

Route::post('/posts/{post}/like', [LikeController::class, 'store'])->name('post.like.store');


Route::get('/posts/{post}/likecount', [LikeController::class, 'likeCount'])->name('post.likeCount');

Route::delete('/posts/{post}/like', [LikeController::class, 'destroy'])->name('post.like.destroy');