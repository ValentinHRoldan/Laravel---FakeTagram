@extends('layouts.base')

@section('tituloHead')
DevsTagram - Login
@endsection

@section('titulo')
Iniciar Sesion En DevsTagram
@endsection

@section('contenido')
    <div class="md:flex  md:justify-center md:gap-1 md:items-center">
        <div class="md:w-6/12 p-20">
            <img src="{{asset('img/login.jpg')}}" alt="">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow">
            <form>
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username:</label>
                    <input type="text" id="username" name="username" class="border p-4 w-full rounded-lg @error('name') border-red-700 @enderror" placeholder="Nombre de usuario">
                    @error('username')
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
                <br>
                <input type="submit" value="Iniciar Sesion" class="bg-orange-600 hover:bg-orange-700 transition-colors cursor-pointer uppercase font-bold w-full p-4 rounded-lg text-white">
            </form>
        </div>  
    </div>

@endsection