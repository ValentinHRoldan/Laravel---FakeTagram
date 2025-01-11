@extends('layouts.base')

@section('tituloHead')
DevsTagram - {{$user->username}}
@endsection

@section('titulo')
Perfil: {{$user->username}}
@endsection


@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                @if($user->imagen)
                <div class="w-128 h-128 overflow-hidden rounded-full">
                    <img src="{{ asset("perfiles/$user->imagen") }}" alt="Imagen usuario" class="w-full h-full object-cover">
                </div>
                @else
                <img src="{{ asset('img/usuario.svg') }}" alt="Imagen usuario">
                @endif
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py10">
                <div class="flex gap-3 items-center">
                    <p class="text-white text-2xl">{{ $user->username }}</p>
                    @if($user->id === auth()->user()->id)
                    <a href="{{route('perfil.index', $user->username)}}" class="hover:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                          </svg>                      
                    </a>
                    @endif
                </div>

                <a href="{{route('user.followers', $user->username)}}" class="text-gray-100 text-sm mb-3 font-bold mt-5 "> {{$user->followers->count()}}
                    <span class="font-normal hover:text-gray-300">@choice('Seguidor|Seguidores', $user->followers->count())</span>
                </a>
                <a href="{{route('user.followings', $user->username)}}" class="text-gray-100 text-sm mb-3 font-bold"> {{$user->followings->count()}}
                    <span class="font-normal">Siguiendo</span>
                </a>
                <p class="text-gray-100 text-sm mb-3 font-bold"> {{$user->posts->count()}}
                    <span class="font-normal">Posts</span>
                </p>
                @auth
                @if($user->id !== auth()->user()->id)
                    @if($user->checkFollow(auth()->user()->id))
                    <form action="{{route('users.unfollow', $user->username)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="dejar de seguir" class=" bg-red-700 hover:bg-red-800 hover:text-gray-300 uppercase rounded-lg px-4 py-1 text-xl font-bold cursor-pointer">
                    </form>
                    @else
                    <form action="{{route('users.follow', $user->username)}}" method="POST">
                        @csrf
                        <input type="submit" value="Seguir" class=" bg-purple-700 hover:bg-purple-800 hover:text-gray-300 uppercase rounded-lg px-4 py-1 text-xl font-bold cursor-pointer">
                    </form>
                    @endif
                @endif
                @endauth
            </div>
        </div>
    </div>
    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
        @if($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($posts as $post)
            <div class="overflow-hidden rounded-md">
                <a href="{{route('post.show', ['post' => $post, 'user' => $user])}}">
                    <img src="{{ asset('uploads') . '/' . $post->imagen}}" alt="{{$post->titulo}}">
                </a>
            </div>
            @endforeach
        </div>
        <br>
        <div>
            {{$posts->links()}}
        </div>
        @else
        <p class="text-white uppercase text-sm text-center font-bold">No hay publicaciones disponibles</p>
        @endif

    </section>

@endsection

@push('msgPerfil')
@if(session('mensaje'))
<div class="bg-green-600 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold" id="msg_actualiazacion">
    {{session('mensaje')}}
</div>
@endif
@vite('resources/js/script_msgPerfil.js')
@endpush
