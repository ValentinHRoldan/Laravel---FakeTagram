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
            <form action="">
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre:</label>
                    <input type="text" id="name" name="name" class="border p-4 w-full rounded-lg" placeholder="Nombre">
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username:</label>
                    <input type="text" id="username" name="username" class="border p-4 w-full rounded-lg" placeholder="Nombre de usuario">
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Correo:</label>
                    <input type="email" id="email" name="email" class="border p-4 w-full rounded-lg" placeholder="Tu correo">
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña:</label>
                    <input type="password" id="password" name="password" class="border p-4 w-full rounded-lg" placeholder="Tu contraseña">
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Confirma tu contraseña:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="border p-4 w-full rounded-lg" placeholder="Tu contraseña">
                </div>
                <br>
                <input type="submit" value="Crear Cuenta" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-4 rounded-lg text-white">
            </form>
        </div>  
    </div>

@endsection