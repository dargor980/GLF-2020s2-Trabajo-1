<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GLF SEM2 T1</title>

        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{asset('js/app.js')}}" defer></script>

    </head>
    <body>
        <div class="container bg-dark mt-5" id="app">
            <grafo></grafo>
        </div>
    </body>
</html>
