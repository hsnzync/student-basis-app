<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src={{ asset('js/jquery-3.4.1.slim.min.js') }}></script>
    <script src={{ asset('js/app.js') }} defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }} integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
                    
    <div id="app" class="base">

        @auth
            {{-- @foreach(Auth::user()->roles as $role) --}}
            @if( auth()->user()->roles->first()->slug == 'superadmin' )
                @include('partials.menu')
                <div class="main admin">
                    @yield('content')
                </div>
            @else
            @include('partials.navigation') 
                <div class="main">
                    @yield('content')
                </div>
            @endif

            {{-- @endforeach --}}
        @else
            @include('partials.navigation')
            <div class="main-landing">
                @yield('content')
            </div>
            @if( request()->route()->getName() == 'landing.index' )
                @include('partials.footer')
            @endif
        @endauth   
    </div>
            
    <script>
        $(function(){
            @section('js')
            @show
        })
    </script>
</body>
</html>