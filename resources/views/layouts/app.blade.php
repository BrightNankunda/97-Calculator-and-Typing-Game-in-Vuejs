<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <script src="{{ asset('js/app.js') }}" async></script>

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body>

        @section('sidebar')
            This is the master sidebar.
        @show

        <div id="app">
            @yield('content')
        </div>
        
    </body>
</html>
