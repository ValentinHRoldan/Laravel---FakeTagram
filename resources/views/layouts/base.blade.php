<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css');
        <title>@yield('tituloHead')</title>
    </head>
    <body>
        <nav>
            <a href="/nosotros">Sobre Nosotros</a>
            <a href="/">Principal</a>
        </nav>
        <h1 class="text-4xl font-extrabold">@yield('titulo')</h1>
    </body>
</html>