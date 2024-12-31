@extends('layouts.base')

@section('tituloHead')
DevsTagram - {{$user->username}} - Post
@endsection

@section('titulo')
{{$post->titulo}}
@endsection

@section('contenido')
<div class="container mx-auto flex">
    <div class="md:w-1/2">
        <img src="{{ asset('uploads') . '/' . $post->imagen}}" alt="Imagen del Post {{$post->titulo}}">
        <div class="p-3">
            <p>55M Likes</p>
        </div>
        <div>
            <p class="font-bold">{{$post->user->username}}</p>
            <p class="text-sm text-gray-100">{{$post->created_at->diffForHumans()}}</p>
            <p class="mt-5">{{$post->descripcion}}</p>
        </div>
    </div>
    <div class="md:w-1/2 p-5">
        <div class="shadow bg-white p-5 mb-5 text-slate-700 rounded-lg">
            <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>
            <form action="">
                <div class="mb-5">
                    <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">Añade un comentario:</label>
                    <textarea type="text" id="comentario" name="comentario" class="border p-4 w-full rounded-lg" placeholder="Agrega..."></textarea>
                </div>
                <input type="submit" value="Comentar publicacion" class="bg-green-700 hover:bg-green-800 transition-colors cursor-pointer uppercase font-bold w-full p-4 rounded-lg text-white">
            </form>
        </div>
    </div>
</div>

@endsection