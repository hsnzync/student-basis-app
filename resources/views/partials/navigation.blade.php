<nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
    <div class="container">
        @auth
            <a class="navbar-brand" href="/browse">
                {{ config('app.name') }}
            </a>
        @else
            <a class="navbar-brand" href="/">
                {{ config('app.name') }}
            </a>
        @endauth
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav row">

                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('browse.index') }}">Bladeren</a>
                </li>
                @endauth

                {{-- @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('landing.catalog') }}">Catalog</a>
                </li>
                @endguest --}}

                <!-- Authentication Links -->
                @guest
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Inloggen</a>
                        </li>
                        <li class="nav-item alt">
                            <a class="nav-link" href="{{ route('register') }}">Registeren</a>
                        </li>
                    @endif
                @else

                    <li class="nav-item ml-auto dropdown">

                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="/uploads/avatars/{{ Auth::user()->avatar }}" alt="avatar" class="rounded-circle c-navbar-avatar">
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right nav-dropdown" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('account.index') }}">My profile</a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>