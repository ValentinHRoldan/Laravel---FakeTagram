@extends('layouts.base')

@section('tituloHead')
FakeTagram - Principal
@endsection

@section('titulo')
Pagina Principal
@endsection


@section('contenido')
<br><hr><br>
@if($posts->count())
    {{-- @foreach ($posts as $post)
        <p class="font-bold uppercase text-2xl text-center">{{$post->titulo}}</p>
        <div class="overflow-hidden rounded-md">
            <a href="{{route('post.show', ['post' => $post, 'user' => $post->user])}}">
                <img src="{{ asset('uploads') . '/' . $post->imagen}}" alt="{{$post->titulo}}" class="w-80 h-80">
            </a>
        </div>
    @endforeach --}}
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($posts as $post)
        <div class="overflow-hidden rounded-md">
            <p class="font-bold uppercase text-2xl text-center">{{$post->titulo}}</p>
            <a href="{{route('post.show', ['post' => $post, 'user' => $post->user])}}">
                <img src="{{ asset('uploads') . '/' . $post->imagen}}" alt="{{$post->titulo}}">
            </a>
            <p class=" uppercase text-xl text-center">{{$post->user->username}}</p>
            <p class=" uppercase text-xl text-center">{{$post->created_at}}</p>
            <p class=" uppercase text-xl text-center"><span class="font-bold">
            <div class="flex items-center gap-3 justify-center">
                <livewire:post-like :post='$post'>
            </div>
        </div>
        @endforeach
    </div>
@else
<p class="text-center font-bold text-2xl">No hay posts disponibles, sigue a un par de personas!</p>
<br>
<hr>
<br>
    {{-- vista de usuarios --}}
<div>
    <x-view-users-component/>
</div>
<br>
<hr>
<br>
<div>
    {{$users->links()}}
</div>
@endif
<br><hr><br>
<a href="{{route('users.all')}}" value="Iniciar Sesion" class="bg-orange-700 hover:bg-orange-800 transition-colors cursor-pointer uppercase font-bold w-full p-4 rounded-lg text-white inline-block text-center">Conoce a mas gente!</a>
@endsection