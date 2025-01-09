@extends('layouts.base')

@section('tituloHead')
FakeTagram - Principal
@endsection

@section('titulo')
Pagina Principal
@endsection


@section('contenido')
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
                <form method="POST" action="{{route('post.like.store', $post)}}" id="form-like">
                    @csrf
                    <div class="my-4">
                        <button type="submit" id="btn-like">
                            <i class="fa-regular fa-heart fa-2xl" style="color: #ffffff; animation-iteration-count: 1;"></i>
                        </button>            
                    </div>      
                </form>
                <p class="text-center">{{$post->likes->count()}}</span> Likes</p>
            </div>
        </div>
        @endforeach
    </div>
@else
<p>No hay posts disponibles, sigue a un par de personas!</p>
@endif
@endsection