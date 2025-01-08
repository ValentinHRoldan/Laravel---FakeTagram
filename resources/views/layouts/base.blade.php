<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles')
        @stack('script_img')
        @stack('alertaConfirm')
        @stack('like')
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <title>@yield('tituloHead')</title>
    </head>
    <body class="bg-slate-700 text-white m-0">
        <header class="p-5 bg-slate-900 m-0 text-white">
            <div class="container mx-auto flex justify-between items-center">
                <a href="/"><h1 class="text-3xl font-black cursor-pointer">FakeTagram</h1></a>
                {{-- 1 forma de comprobar autenticacion --}}
                {{-- @if(Auth::user())
                    <p>autenticado</p>
                @else 
                    <p>no autenticado</p>
                @endif --}}


                @guest
                <nav class="flex gap-2 items-center">
                    <a href="{{ route('login') }}" class="text-sm font-bold text-white uppercase p-2 bg-green-600 rounded-lg">Login</a>
                    <a href="{{route('registro')}}" class="text-sm font-bold text-white uppercase p-2 bg-sky-600 rounded-lg">Crear Cuenta</a>
                </nav>
                @endguest

                @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <nav class="flex gap-2 items-center">
                        <a href="{{ route('post.create') }}" class="flex items-center gap-2 text-sm font-bold text-white uppercase p-2.5 bg-green-600 hover:bg-green-700 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                              </svg>
                              Publicar
                        </a>

                        <a href="{{ route('post.index', auth()->user()->username) }}" class="text-sm font-bold text-white uppercase p-3 bg-slate-500 hover:bg-slate-700 rounded-lg">{{ auth()->user()->username }}</a>

                        <input type="submit" class="text-sm font-bold text-gray-50 uppercase cursor-pointer hover:bg-red-800 p-3 rounded-lg bg-red-700" value="Cerrar Sesion">
                    </nav>
                </form>
                @endauth


            </div>
        </header>
        <main class="container mx-auto mt-10">
            @stack('msgPerfil')
            <h2 class="font-black text-center text-3xl mb-10">@yield('titulo')</h2>
            @yield('contenido')
        </main>
        <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
            Cursito laravel 2025 😎
        </footer>
    </body>
</html>