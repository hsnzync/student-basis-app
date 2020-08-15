<div class="nav-main bg-dark px-0">
    <div class="nav-content">
        <div class="nav-title pt-5 pb-4">
            <span class="nav-content-item">
                <img src="{{ asset('img/logo.svg') }}" class="pr-1" alt="">@lang('content.navigation.title')
            </span>
        </div>
        <navigation-items></navigation-items>
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
    </div>
</div>
