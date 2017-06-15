<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WikiCupon</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Mogra|Patrick+Hand+SC|Satisfy" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                /*font-family: 'Raleway', sans-serif;
                font-weight: 100;*/
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
                height: 25px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #f5f8ff;
                padding: 0 25px;
                font-family: 'Patrick Hand SC', cursive;
                font-size: large;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            #welcomeBg{
                width: 100%;
                height: 100%;
                background: #1b6d85 url({{asset('images/fondoViajes.jpeg')}}) no-repeat center;
                background-size: cover;
            }

            #textBlock{
                padding-top: 8%;
                color: #124857;
                font-family: 'Mogra', cursive;
                font-size: x-large;
                text-shadow: 2px 2px 4px #000000;
            }

            #paragraph{
                color: #f5f8ff;
                font-family: 'Patrick Hand SC', cursive;
                font-size: x-large;
                font-weight: bolder;
                padding-top: 5%;
            }

            #paragraphContainer{
                margin: 0 auto;
                width: 30%;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a href="{{ url('/login') }}">Acceder</a>
                        <a href="{{ url('/register') }}">Registrarse</a>
                    @endif
                </div>
            @endif

            <div class="content" id="welcomeBg">
                <div id="textBlock">
                    <h1>Bienvenido a WikiCupon!</h1>
                    <img src="{{asset('images/wLogo.png')}}">
                    <div id="paragraphContainer">
                        <p id="paragraph">Encuentra tus cupones favoritos en el sitio del mayor catalogo de cupones de Costa Rica!</p>
                    </div>
            </div>
        </div>
    </body>
</html>
