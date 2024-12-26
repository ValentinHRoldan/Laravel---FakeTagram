<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>@yield('tituloHead')</title>
    </head>
    <body class="bg-slate-700 text-white m-0">
        <header class="p-5 bg-orange-700 m-0">
            <div class="container mx-auto flex justify-between items-center">
                <a href="/"><h1 class="text-3xl font-black cursor-pointer">DevsTagram</h1></a>
                {{-- 1 forma de comprobar autenticacion --}}
                {{-- @if(Auth::user())
                    <p>autenticado</p>
                @else 
                    <p>no autenticado</p>
                @endif --}}


                @guest
                <nav class="flex gap-2 items-center">
                    <a href="{{ route('login') }}" class="text-sm font-bold text-gray-50 uppercase">Login</a>
                    <a href="{{route('registro')}}" class="text-sm font-bold text-gray-50 uppercase">Crear Cuenta</a>
                </nav>
                @endguest

                @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <nav class="flex gap-2 items-center">
                        <input type="submit" class="text-sm font-bold text-gray-50 uppercase" value="Cerrar Sesion">
                    </nav>
                </form>
                @endauth


            </div>
        </header>
        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">@yield('titulo')</h2>
            @yield('contenido')
        </main>
        <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
            Valenchuskychusky
        </footer>
    </body>
</html>