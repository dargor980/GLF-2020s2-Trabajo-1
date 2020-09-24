<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GLF SEM2 T1</title>

        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <script src="{{asset('js/app.js')}}" defer></script>

    </head>
    <body>
        <nav id="navbar" class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!--NOMBRE-->
                <div class="navbar-brand text-white lato">Trabajo Unidad 1: Grafos</div>
                <!--/NOMBRE-->
          
                <!--OPCIONES NAVBAR-->
                <div class="collapse navbar-collapse justify-content-end">
                  <ul class="navbar-nav ml-md-auto d-none d-md-flex">
                    <li class="nav-item active">
                      <a class="nav-link text-white lato">Introducción</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-white lato">Grafos</a>
                    </li>
                    <li class="nav-item active">
                    <a class="nav-link text-white lato">Integrantes</a>
                    </li>
                  </ul>
                </div>
                <!--/OPCIONES NAVBAR-->
            </div>
        </nav>
        <div class="mt-5 mx-5" id="app">
            <grafo></grafo>
        </div>
    </body>
</html>
