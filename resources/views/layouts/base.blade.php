<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css');
        <title>@yield('tituloHead')</title>
    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">DevsTagram</h1>
                <nav class="flex gap-2 items-center">
                    <a href="" class="text-sm font-bold text-gray-600 uppercase">Login</a>
                    <a href="" class="text-sm font-bold text-gray-600 uppercase">Crear Cuenta</a>
                </nav>
            </div>
        </header>
        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">@yield('titulo')</h2>
            @yield('contenido')
        </main>
        <footer class="text-center p-5 text-gray-500 font-bold uppercase">
            todos los derechos blablabla
        </footer>
    </body>
</html>