<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                background-color: rgba(170, 171, 175, 0.57);
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #191a1b;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
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
                color: #16080f;
            }

            #paragraph{
                color: #110c0d;
                font-size: large;
                font-family: Avenir, Helvetica, sans-serif;
                font-weight: bold;
                padding-top: 8%;
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
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content" id="welcomeBg">
                <div id="textBlock">
                    <h1>Bienvenido a WikiCupon!</h1>
                    <p id="paragraph">Encuentra tus cupones favoritos en el sitio del mayor catalogo de cupones de Costa Rica!</p>
                </div>
            </div>
        </div>
    </body>
</html>
