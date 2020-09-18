<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">
</head>

<body class="main-container">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm navmain">
            <div class="container">
               
            <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                            <img src="http://localhost:8000/css/favicon.ico" alt="not found image" width="20px">
                        </a>


            <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mr-auto">

                    @guest

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                Iniciar Sesión    
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                Registrarse
                            </a>
                        </li>
                    @else


                    <li class="nav-item">
                    <a class="nav-link" href="{{ url('/home') }}">
                            Trailers
                        </a>
                    </li>             

                    @endguest

                    </ul>                      
                  </div>

                @guest
                @else
                <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                </ul>
                    @endguest
            </div>
        </nav>

        <main class="py-4">
            @yield('content')

            <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
                <df-messenger
                    intent="WELCOME"
                    chat-title="ViewMovie"
                    chat-icon="css/favicon.ico"
                    agent-id="ee0b59f9-6751-4a51-81c2-0a3141b8488c"
                    language-code="es"
                ></df-messenger>
        </main>

    </div>
</body>

</html>