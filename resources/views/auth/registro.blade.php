@extends('layouts.base')

@section('tituloHead')
DevsTagram - Registro
@endsection

@section('titulo')
Crear una cuenta en DevsTagram
@endsection

@section('contenido')
    <div class="md:flex  md:justify-center md:gap-1 md:items-center">
        <div class="md:w-6/12 p-20">
            <img src="{{asset('img/f2.jpg')}}" alt="">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow">
            <form action="{{route('registro')}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre:</label>
                    <input type="text" id="name" name="name" class="border p-4 w-full rounded-lg @error('name') border-red-700 @enderror" placeholder="Nombre" value="{{ old('name')}}">
                    @error('name')
                        <p class="bg-red-700 text-white my-2 rounded-lg text-sm p-2 text-center font-bold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username:</label>
                    <input type="text" id="username" name="username" class="border p-4 w-full rounded-lg @error('name') border-red-700 @enderror" placeholder="Nombre de usuario">
                    @error('username')
                        <p class="bg-red-700 text-white my-2 rounded-lg text-sm p-2 text-center font-bold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Correo:</label>
                    <input type="email" id="email" name="email" class="border p-4 w-full rounded-lg @error('name') border-red-700 @enderror" placeholder="Tu correo">
                    @error('email')
                        <p class="bg-red-700 text-white my-2 rounded-lg text-sm p-2 text-center font-bold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña:</label>
                    <input type="password" id="password" name="password" class="border p-4 w-full rounded-lg @error('name') border-red-700 @enderror" placeholder="Tu contraseña">
                    @error('password')
                        <p class="bg-red-700 text-white my-2 rounded-lg text-sm p-2 text-center font-bold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Confirma tu contraseña:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="border p-4 w-full rounded-lg @error('name') border-red-700 @enderror" placeholder="Tu contraseña">
                    @error('password_confirmation')
                        <p class="bg-red-700 text-white my-2 rounded-lg text-sm p-2 text-center font-bold">{{ $message }}</p>
                    @enderror
                </div>
                <br>
                <input type="submit" value="Crear Cuenta" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-4 rounded-lg text-white">
            </form>
        </div>  
    </div>

@endsection