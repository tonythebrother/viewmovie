<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>View Movie</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">
</head>

<body class="background">
    @if (Route::has('login'))

    @endif

        <div class="jumbotron text-center text-light bg-dark">
            <div class="title m-b-md">
                <h1>
                {{ config('app.name', 'Laravel') }}
                <img src="/css/favicon.ico" alt="not found image" width="40px">
            </h1>
            </div>

            <h5>Se bienvenido a View Movie, esta es la pagina donde te mantendras a la vanguardia del
                mundo del
                cine, <br> encontraras los ultimos trailers de las peliculas del momento, <br> y
                disfrutara
                compartiendolos
                con sus amigos. <br><br>
                ¡Disfrute de View Movie!
            </h5>
            <br>
            <div class="container-fluid">
                <ul class="nav justify-content-center row nav-pills">
                @auth
                    <li class="nav-item col-sm-3">
                        <a class="nav-link text-dark bg-light" href="{{ url('/home') }}">Ir al Muro de peliculas</a>
                    </li>
                    <br>
                @else
                <li class="nav-item col-sm-3">
                        <a class="nav-link text-dark bg-light" href="{{ url('/login') }}">Iniciar Sesión</a>
                    </li>
                    <br>
                    <br>
                    <li class="nav-item col-sm-3">
                        <a class="nav-link text-dark bg-light" href="{{ url('/guests') }}">Ir al Muro de peliculas</a>
                    </li>
                    <br>
                    <br>
                    <li class="nav-item col-sm-3">
                        <a class="nav-link text-dark bg-light" href="{{ url('/register') }}">Registrarse</a>
                    </li>
                    <br>
                @endauth
                </ul>
            </div>
        </div>

        <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
                <df-messenger
                    intent="WELCOME"
                    chat-title="ViewMovie"
                    chat-icon="/css/favicon.ico"
                    agent-id="ee0b59f9-6751-4a51-81c2-0a3141b8488c"
                    language-code="es"
                ></df-messenger>
</body>

</html>
