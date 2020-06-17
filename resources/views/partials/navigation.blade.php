<!-- Sidebar -->
<div class="nav-main bg-dark px-0">
    <div class="nav-title py-5"><i class="fab fa-stripe-s"></i></div>
    <div class="nav-content">
        <ul class="nav-items">
            <li class="py-1">
                <a href="{{ route('platform.browse.index') }}" class="nav-content-item {{ request()->is('browse') ? 'is-active' : '' }}"><i class="fas fa-columns"></i></a>
                Dashboard
            </li>
            <li class="py-1">
                <a href="#likes" class="nav-content-item"><i class="far fa-heart"></i></a>
                Likes
            </li>

            <li class="py-1">
                <a href="#community" class="nav-content-item"><i class="far fa-comments"></i></a>
                Community
            </li>

            <li class="py-1">
                <a href="#settings" class="nav-content-item"><i class="fas fa-cog"></i></a>
                Instellingen
            </li>
        </ul>
        <div class="nav-footer">
            <ul class="m-0">
                <li class="nav-item dropdown py-5">
                    <a id="nav-item-dropdown" class="nav-content-item" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="/uploads/avatars/{{ auth()->user()->avatar }}" alt="avatar" class="rounded-circle avatar">
                        {{-- <img src="{{ Avatar::create($full_name)->toBase64() }}" /> --}}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right nav-dropdown" aria-labelledby="nav-item-dropdown">

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
            </ul>
        </div>
        {{-- <ul>
            <li class="py-3">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-content-item"><i class="fas fa-sign-out-alt"></i></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul> --}}
    </div>
</div>
