<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Page - @yield('title')</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('js/app.js') }}" type="text/js"></script>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="{{route('home')}}">Accueil</a>
        </nav>
        <br>
        <div class="container">
            <div class="row justify-content-md-center">
                @yield('content')
            </div>
        </div>
    </body>
</html>
    