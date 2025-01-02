@extends('layouts.base')

@section('tituloHead')
FakeTagram - Login
@endsection

@section('titulo')
Iniciar Sesion En FakeTagram
@endsection

@section('contenido')
    <div class="md:flex  md:justify-center md:gap-1 md:items-center">
        <div class="md:w-6/12 p-20">
            <img src="{{asset('img/login.jpg')}}" alt="">
        </div>
        <div class="md:w-4/12 bg-white text-black p-6 rounded-lg shadow">
            <form action="{{ route('post.login') }}" method="POST">
                @csrf
                @if(session('mensaje'))
                    <p class="bg-red-700 text-white my-2 rounded-lg text-sm p-2 text-center font-bold">{{ session('mensaje') }}</p>                    
                @endif
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
                    <input type="checkbox" name="remember" class="text-sm text-gray-600"> Mantener la sesion abierta
                </div>
                <br>
                <input type="submit" value="Iniciar Sesion" class="bg-green-700 hover:bg-green-800 transition-colors cursor-pointer uppercase font-bold w-full p-4 rounded-lg text-white">
            </form>
        </div>  
    </div>

@endsection