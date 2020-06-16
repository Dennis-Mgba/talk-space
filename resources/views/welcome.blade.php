<!doctype html>
<html lang="{{ app()->getLocale() }}">
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

            .content {
                text-align: center;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .button {
                background-color: #008CBA;
                border: none;
                border-radius: 7px;
                padding: 16px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                margin: 4px 2px;
                transition-duration: 0.4s;
                cursor: pointer;
                font-size: 30px;
                color: #fff;
            }

            .button:hover {
                box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
            }


        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="m-b-md">
                    <a href="/forum"><button class="button">Talk Space</button></a>
                </div>

                <div class="links">
                    <!-- This authentiate a user if they want to login in using github or facebook -->
                    <a href="{{ route('social.auth', ['provider' => 'github']) }}">GitHub</a>
                    <a href="{{ route('social.auth', ['provider' => 'facebook']) }}">Facebook</a>
                    <a href="/login">Email login</a>
                </div>
                <div style="margin-top: 50px;">
                    @if (Route::has('login'))
                        <div class="links">
                            @auth
                                {{-- <a href="{{ url('/home') }}">Home</a> --}}
                            @else
                                {{-- <a href="{{ route('login') }}">Login</a> --}}
                                <a href="{{ route('register') }}">Click here to register</a>
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
