<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Route;

// usa un closure o callback

// Route::get('/', function () {
//     return view('principal');
// });


// Route::get('/nosotros', function(){
//     return view('nosotros');
// });

Route::get('/', HomeController::class)->name('home')->middleware('auth');

Route::get('/registro', [RegistroController::class, 'index'])->name('registro');
Route::post('/registro', [RegistroController::class, 'store'])->name('registro');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.post');

Route::post('/logout', [LogoutController::class, 'index'])->name('logout');

//rutas para editar perfil

Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');

Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');


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

Route::post('/posts/{post}/like', [LikeController::class, 'store'])->name('post.like.store')->middleware('auth');


Route::get('/posts/{post}/likecount', [LikeController::class, 'likeCount'])->name('post.likeCount');

Route::delete('/posts/{post}/like', [LikeController::class, 'destroy'])->name('post.like.destroy');

Route::post('/{user:username}/follow', [FollowerController::class, 'store'])->name('users.follow');

Route::delete('/{user:username}/unfollow', [FollowerController::class, 'destroy'])->name('users.unfollow');
