@extends('layouts.base')

@section('tituloHead')
DevsTagram - Crear Publicacion
@endsection

@section('titulo')
Nueva Publicacion
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush


@section('contenido')
<div class="md:flex  md:justify-center md:gap-1 md:items-center">
    <div class="md:w-6/12 p-20">
        <form action="{{ route('imagen.post') }}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center text-white bg-slate-700 border-white cursor-pointer">

        </form>
    </div>
    <div class="md:w-6/12 bg-white text-black p-6 rounded-lg shadow">
        <form action="{{route('registro')}}" method="POST">
            @csrf
            <div class="mb-5">
                <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">Titulo:</label>
                <input type="text" id="titulo" name="titulo" class="border p-4 w-full rounded-lg @error('name') border-red-700 @enderror" placeholder="Titulo" value="{{ old('name')}}">
                @error('name')
                    <p class="bg-red-700 text-white my-2 rounded-lg text-sm p-2 text-center font-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">Descripcion:</label>
                <textarea type="text" id="descripcion" name="descripcion" class="border p-4 w-full rounded-lg @error('name') border-red-700 @enderror" placeholder="Descripcion" value="{{ old('name')}}"></textarea>
                @error('name')
                    <p class="bg-red-700 text-white my-2 rounded-lg text-sm p-2 text-center font-bold">{{ $message }}</p>
                @enderror
            </div>
            <br>
            <input type="submit" value="Crear Publicacion" class="bg-green-700 hover:bg-green-800 transition-colors cursor-pointer uppercase font-bold w-full p-4 rounded-lg text-white">
        </form>
    </div>  
</div>

@endsection