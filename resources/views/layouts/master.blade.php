<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
        
    <div id="app">

        @auth
            @foreach(Auth::user()->roles as $role)

                @if($role->id == 2)
                    @include('partials.sidebar')
                    <main class="main admin">
                @else
                    @include('partials.navigation')
                    <main class="main">
                @endif

            @endforeach
        @else
            @if(!request()->segment(1) == 'login' || !request()->segment(1) == 'register')
                @include('partials.navigation')
            @endif
            <main class="main">
        @endauth

            @yield('content')
        </main>

        @auth
            @foreach(Auth::user()->roles as $role)
                @if($role->id == 1)
                    @include('partials.footer')
                @endif
            @endforeach
        @else
            @if(!request()->segment(1) == 'login' || !request()->segment(1) == 'register')
                @include('partials.footer')
            @endif
        @endauth

    </div>

    <script>
        @section('js')
        
        $(function(){
            @show
        })
        
    </script>
</body>
</html>