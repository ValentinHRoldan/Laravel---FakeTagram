@extends('layouts.base')


@section('tituloHead')
FakeTagram - Editar Perfil
@endsection

@section('titulo')
Editar Perfil: {{auth()->user()->username}}
@endsection

@section('contenido')
<div class="md:flex md:justify-center ">
    <div class="md:w-1/2 bg-white shadow p-6 rounded-md">
        <form action="{{route('perfil.store')}}" class="mt-5 md:mt-0 mb-5 text-black" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="mb-5">
                <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username:</label>
                <input type="text" id="username" name="username" class="border p-4 w-full rounded-lg @error('username') border-red-700 @enderror" placeholder="Nombre de usuario" value="{{auth()->user()->username}}">
                @error('username')
                    <p class="bg-red-700 text-white my-2 rounded-lg text-sm p-2 text-center font-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="img-perfil" class="mb-2 block uppercase text-gray-500 font-bold">Foto de perfil:</label>
                <input type="file" id="img-perfil" name="imgperfil" class="border p-4 w-full rounded-lg" accept=".jpg, .jpeg, .png">
            </div>
            <input type="submit" value="Guardar cambios" class="bg-sky-700 hover:bg-sky-800 transition-colors cursor-pointer uppercase font-bold w-full p-4 rounded-lg text-white">
        </form>
    </div>
</div>

@endsection