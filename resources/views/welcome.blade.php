<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background: repeating-linear-gradient(45deg, white 50%,skyblue 30%, blue);
                color: #8A0829;
                font-family: 'Nunito', sans-serif;
                font-weight: 500;
                height: 100vh;
                margin: 0;
                padding: 0;
                height: 100%;
            }

            @keyframes slidein {
                from {
                    margin-left: 100%;
                    width: 300%;
                }
                to {
                    margin-left: 0%;
                    width: 100%;
                }
                /* 75% {
                    font-size: 300%;
                    margin-left: 25%;
                    width: 150%;
                } */

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
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                animation-duration: 3s;
                animation-name: slidein;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            img{
                border: 1px solid #FF00FF;
                width: 150px;
                height: 150px;
            }
            body{
                background-image:url(fall.png);
                background-color:#D9E5FF;
                background-repeat:no-repeat;
                background-size:contain;
                background-position:center center;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
                <div class="top-right links">
                    @auth
                        <a href="{{ route('logout') }}">Logout</a>
                    @else
                        <a href="{{ url('/custom-login') }}">Login</a>
                        <a href="{{ url('/custom-register') }}">Register</a>
                    @endauth
                </div>

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                    <img src="./img/logo.png">
                </div>


                <div class="links">
                    <a href="{{ route('questions.index') }}">question</a>
                    <a href="/japan">Semester</a>
                </div>
            </div>
        </div>
    </body>
</html>
