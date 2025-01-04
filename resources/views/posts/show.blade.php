@extends('layouts.base')

@section('tituloHead')
FakeTagram - {{$user->username}} - Post
@endsection

@section('titulo')
{{$post->titulo}}
@endsection

@section('contenido')
<div class="container mx-auto md:flex">
    <div class="md:w-1/2">
        <img src="{{ asset('uploads') . '/' . $post->imagen}}" alt="Imagen del Post {{$post->titulo}}">
        <div class="p-3">
            <p class="text-lg">55M Likes</p>
        </div>
        <div>
            <p class="font-bold text-xl">{{$post->user->username}}</p>
            <p class="text-sm text-gray-100">{{$post->created_at->diffForHumans()}}</p>
            <p class="mt-5">{{$post->descripcion}}</p>
        </div>
        @auth
        @if(auth()->user()->id === $user->id)
        <div>
            <form action="{{route('posts.destroy', $post)}}" method="POST" id="delete_form">
                @method('DELETE')
                @csrf
                <input type="submit" class="bg-red-600 hover:bg-red-800 font-bold uppercase p-2 rounded-lg mt-10" value="eliminar publicacion" id="btn_delete_post">
            </form>
        </div>
        @endif
        @endauth
    </div>
    
    <div class="md:w-1/2 p-5">
        
        <div class="shadow bg-white p-5 mb-5 text-slate-700 rounded-lg">
            @guest
            <p class="text-xl font-bold text-center mb-4">Inicia sesion para comentar 😉</p>
            @endguest
            
            @auth
            <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>
            @if(session('mensaje'))
            <div class="bg-green-600 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                {{session('mensaje')}}
            </div>
            @endif
            <form action="{{route('comentario.store', ['user'=>$user, 'post'=>$post])}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">Añade un comentario:</label>
                    <textarea type="text" id="comentario" name="comentario" class="border p-4 w-full rounded-lg" placeholder="Agrega..."></textarea>
                    @error('comentario')
                    <p class="bg-red-700 text-white my-2 rounded-lg text-sm p-2 text-center font-bold">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" value="Comentar publicacion" class="bg-green-700 hover:bg-green-800 transition-colors cursor-pointer uppercase font-bold w-full p-4 rounded-lg text-white">
            </form>
            @endauth
            <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                @if($post->comentarios->count())
                    @foreach($post->comentarios as $comentario)
                        <div class="p-5 border-gray-400 border-b">
                            <a href="{{route('post.index', $comentario->user)}}" class="font-bold">{{$comentario->user->username}}</a>
                            <p>{{$comentario->comentario}}</p>
                            <p>{{$comentario->created_at->diffForHumans()}}</p>
                        </div>
                    @endforeach
                @else
                    <p class="p-10 text-center font-bold uppercase">no hay nada aún</p>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection

@push('alertaConfirm')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@vite('resources/js/script_delete.js')
@endpush