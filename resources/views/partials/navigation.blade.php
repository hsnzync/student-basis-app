<!-- Sidebar -->
<div class="nav-main bg-dark px-0">
    <div class="nav-content">
        <div class="nav-title pt-5 pb-4">
            <span class="nav-content-item">
                {{-- <i class="fab fa-stripe-s"></i> --}}
                <img src="{{ asset('img/logo.svg') }}" class="pr-1" alt="">@lang('content.navigation.title')
            </span>
        </div>
        <ul class="nav-items">
            <li class="py-1">
                {{-- <router-link to="/browse" class="nav-content-item {{ request()->is('browse') ? 'is-active' : '' }}"><i class="fas fa-columns"></i></router-link> --}}
                <a href="#dashboard" class="nav-content-item {{ request()->is('browse') ? 'is-active' : '' }}">
                    <i class="fas fa-columns pr-3"></i>
                    <span>@lang('content.navigation.dashboard')</span>
                </a>
            </li>

            <li class="py-1">
                {{-- <router-link to="/browse" class="nav-content-item {{ request()->is('browse') ? 'is-active' : '' }}"><i class="fas fa-columns"></i></router-link> --}}
                <a href="{{ route('platform.browse.index') }}" class="nav-content-item">
                    <i class="far fa-folder pr-3"></i>
                    <span>@lang('content.navigation.lessons')</span>
                </a>
            </li>

            <li class="py-1">
                <a href="#community" class="nav-content-item">
                    <i class="far fa-comments pr-3"></i>
                    <span>@lang('content.navigation.community')</span>
                </a>
            </li>

            <li class="py-1">
                <a href="#rankings" class="nav-content-item">
                    <i class="fas fa-star pr-3"></i>
                    <span>@lang('content.navigation.rankings')</span>
                </a>
            </li>

            <li class="py-1">
                {{-- <router-link to="/my-profile" class="nav-content-item"><i class="fas fa-user"></i></router-link> --}}
                <a href="{{ route('platform.account.index') }}" class="nav-content-item">
                    <i class="fas fa-cog pr-3"></i>
                    <span>@lang('content.navigation.settings')</span>
                </a>
            </li>
        </ul>
        <div class="nav-footer">
            <ul class="m-0">
                <li class="py-4">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-content-item">
                        <i class="fas fa-sign-out-alt pr-3"></i>
                        <span>@lang('content.navigation.logout')</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        {{-- <div class="nav-footer">
            <ul class="m-0">
                <li class="nav-item dropdown py-4">
                    <a id="nav-item-dropdown" class="nav-content-item rounded-circle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ auth()->user()->short_name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right nav-dropdown" aria-labelledby="nav-item-dropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            @lang('content.navigation.logout')
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div> --}}
    </div>
</div>
