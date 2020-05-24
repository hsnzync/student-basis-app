<nav class="navbar navbar-expand-sm navbar-laravel {{ request()->route()->getName() == 'landing.index' || request()->route()->getName() == 'register' || request()->route()->getName() == 'login' ? '' : 'navbar-main' }}">
    <div class="container">
        <a class="navbar-brand" href="{{ auth()->user() ? '/browse' : '/'  }}">Studentbase</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav row">
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('platform.browse.index') }}">Bladeren</a>
                    <a class="nav-link" href="#">Community</a>
                    <a class="nav-link" href="#">Help</a>
                </li>
                @endauth

                <!-- Authentication Links -->
                @auth
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="/uploads/avatars/{{ Auth::user()->avatar }}" alt="avatar" class="rounded-circle c-navbar-avatar">
                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right nav-dropdown" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('platform.account.index') }}">My profile</a>

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
                @endauth
            </ul>
        </div>
    </div>
</nav>
