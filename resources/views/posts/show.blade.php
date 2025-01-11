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
        <div class="p-3 flex items-center gap-3">
            @guest
            <div class="my-4">
                <a href="{{route('login')}}">
                    <i class="fa-regular fa-heart fa-2xl" style="color: #ffffff; animation-iteration-count: 1;"></i>
                </a>
            </div>      
            @endguest
            @auth
            <livewire:post-like :post='$post'>
            @endauth
            <p class="text-lg font-bold" id="like-count"></p>
        </div>
        <div>
            <p class="font-bold text-2xl">{{$post->titulo}}</p>
            <a href="{{route('post.index', $post->user)}}" class="text-xl hover:text-gray-300">{{$post->user->username}}</a>
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
            <div class="bg-green-600 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold" id="msg_agregacion">
                {{session('mensaje')}}
            </div>
            @endif
            @if(session('mensaje_delete'))
            <div class="bg-red-600 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold" id="msg_eliminacion">
                {{session('mensaje_delete')}}
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
            
            <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                @if($post->comentarios->count())
                    @foreach($post->comentarios as $comentario)
                    <div class="p-5 border-gray-400 border-b flex justify-between items-center">
                        <div>
                            <a href="{{route('post.index', $comentario->user)}}" class="font-bold hover:text-gray-500">{{$comentario->user->username}}</a>
                            <p>{{$comentario->comentario}}</p>
                            <p>{{$comentario->created_at->diffForHumans()}}</p>
                        </div>
                        @if(auth()->user()->id === $comentario->user->id)
                        <form action="{{route('comentario.destroy', $comentario)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" class="text-red-500 hover:text-red-700 cursor-pointer" value="Eliminar Comentario">
                        </form>
                        @endif
                    </div>
                    @endforeach
                @else
                    <p class="p-10 text-center font-bold uppercase">no hay nada aún</p>
                @endif
                @endauth
            </div>
        </div>
    </div>

</div>
@endsection

@push('alertaConfirm')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@vite('resources/js/script_delete.js')
@endpush

@push('like')
@vite('resources/js/script_like.js')
@endpush