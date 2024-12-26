@extends('layouts.base')

@section('tituloHead')
DevsTagram - muro
@endsection

@section('titulo')
Tu Cuenta
@endsection


@section('contenido')

    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/usuario.svg') }}" alt="Imagen usuario">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <p class="text-white text-2xl">{{ Auth::user()->username }}</p>
            </div>
        </div>

    </div>

@endsection