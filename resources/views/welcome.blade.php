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
                background: linear-gradient(to bottom, #F5A9A9,#D8CEF6);
                color: #8A0829;
                font-family: 'Nunito', sans-serif;
                font-weight: 500;
                height: 100vh;
                margin: 0;
                padding: 0;
                height: 100%;
            }
            html {
                background: #eee;
            }
            body {
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .box{
                width: 300px;
                height: 300px;
                border-radius: 5px;
                box-shadow: 0 2px 30px rgba(black, .2);
                background: lighten(#f0f4c3, 10%);
                position: relative;
                overflow: hidden;
                transform: translate3d(0, 0, 0);
            }
            .wave {
                opacity: .4;
                position: absolute;
                top: 3%;
                left: 50%;
                background: linear-gradient(to bottom,#DA81F5,#D8CEF6);
                width: 500px;
                height: 500px;
                margin-left: -250px;
                margin-top: -250px;
                transform-origin: 50% 48%;
                border-radius: 43%;
                animation: drift 3000ms infinite linear;
            }
            .wave.-three {
                animation: drift 5000ms infinite linear;
            }

            .wave.-two {
                animation: drift 7000ms infinite linear;
                opacity: .1;
                background: yellow;
            }

            .box:after {
                content: '';
                display: block;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(to bottom, rgba(#e8a, 1), rgba(#def, 0) 80%, rgba(white, .5));
                z-index: 11;
                transform: translate3d(0, 0, 0);
            }
            .menu {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .links {
                position: flex;
                align-items: center;
                display: flex;
                justify-content: center;

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
            /* .full-height {
                height: 100vh;
            } */

            /* .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            } */

            /* .position-ref {
                position: relative;
            } */

            /* .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            } */

            .content {
                position: absolute;
               text-align:center;
                bottom: 200px;
            }
            @keyframes drift {
                from { transform: rotate(0deg); }
                from { transform: rotate(360deg); }
            }

            .title {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                z-index: 1;
                line-height: 300px;
                text-align: center;
                transform: translate3d(0, 0, 0);
                color: black;
                text-transform: uppercase;
                font-family: 'Playfair Display', serif;
                letter-spacing: .4em;
                font-size: 24px;
                text-shadow: 0 1px 0 rgba(black, .1);
                text-indent: .3em;
                /* font-size: 84px; */
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
            /* body{
                background-image:url(fall.png);
                background-color:#D9E5FF;
                background-repeat:no-repeat;
                background-size:contain;
                background-position:center center;
            } */
        </style>
    </head>
    <body>
            <!-- <div class="flex-right position-ref full-height"> -->
            <div class="menu links">
                    @auth
                        <a href="{{ route('logout') }}">Logout</a>
                    @else
                        <a href="{{ url('/custom-login') }}">Login</a>
                        <a href="{{ url('/custom-register') }}">Register</a>
                    @endauth
                </div>
            <div class="content">
                <div class="links">
                    <a href="{{ route('questions.index') }}">question</a>
                    <a href="/japan">Semester</a>
                    <!-- <a href="{{ url('/photo') }}">Photo</a> -->
                </div>
            </div>
            <div class="box">
                    <div class="title m-b-md">
                        Laravel
                        <!-- <img src="./img/logo.png"> -->
                    </div>
                <div class='wave -one'></div>
                    <div class='wave -two'></div>
                    <div class='wave -three'></div>
                    <div class="top-right links">
                </div>
            </div>
        <!-- <div>
            <img src="./img/logo.png">
        </div> -->
    </body>
</html>
