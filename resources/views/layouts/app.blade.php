<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Talk-Space') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- toastr styles -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/forum') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

            @if ($errors->count() > 0)
                <ul class="list-group-item"  style="background-color: #ffb3b3; list-style: none;">
                    {{-- @foreach ($errors->all() as $error) --}}
                        <li class=" text-danger text-center">
                            {{-- {{ $error }} --}}
                            {{ 'Please fill all fields' }}
                        </li>
                    {{-- @endforeach --}}
                </ul><br><br>
            @endif

        <div class="container">
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="list-group">
                            <li class="list-group-item">
                                <a href="/forum?filter=me" style="text-decoration: none;">Participated Discussions</a>
                            </li>
                            <li class="list-group-item">
                                <a href="/forum?filter=solved" style="text-decoration: none;">Answered Discussions</a>
                            </li>
                            <li class="list-group-item">
                                <a href="/forum?filter=unsolved" style="text-decoration: none;">Unanswered Discussions</a>
                            </li>
                        </div>

                        <span>
                            <a href="{{ url('/forum') }}" style="margin: 30px 0 0 15px;">view all discussions</a>
                        </span>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        CHANNELS
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            @foreach ($channels as $channel)
                                <li class="list-group-item">
                                    <a href="{{ route('channel', ['slug' => $channel->slug]) }}" style="text-decoration: none;">{{ $channel->title }}</a>
                                </li>
                            @endforeach

                                <span>
                                    {{-- <a href="{{ route('channels.index') }}" class="btn btn-xs btn-default" style="margin-top: 30px;">channel dashboard</a> --}}
                                    <a href="{{ route('channels.create') }}" class="btn btn-xs btn-primary pull-right" style="margin-top: 30px;">Add +</a>
                                </span>
                        </div>
                    </div>
                </div>

                <a href="{{ route('discussions.create') }}" type="button" name="button" class="form-control btn btn-primary">Create a new discussion</a>

            </div>
            <div class="col-md-9">
                @yield('content')

                {{-- <ul class="">
                    <li class="" style="list-style-type: none; margin: 20px 0 0 -30px">
                        <a href="/forum" style="text-decoration: none;">Go back to home</a>
                    </li>
                </ul> --}}
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- toastr js -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    {{--check for presence of a session in our application, so that we can use the toastr--}}
    <script>
      @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
      @elseif (Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
      @elseif (Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
      @endif
    </script>
</body>
</html>
