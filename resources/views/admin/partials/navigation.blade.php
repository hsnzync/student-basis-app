<div class="nav-main bg-dark px-0">
    <div class="nav-content">
        <div class="nav-title pt-5 pb-4">
            <span class="nav-content-item">
                <img src="{{ asset('img/logo.svg') }}" class="pr-1" alt="">@lang('content.navigation.title')
            </span>
        </div>
        <ul class="nav-items">
            <li class="py-1">
                <a href="{{ route('admin.index') }}" class="nav-content-item {{ request()->is('admin') ? 'is-active' : '' }}">
                    <i class="fas fa-compass pr-3"></i>
                    <span>@lang('content.admin.navigation.dashboard')</span>
                </a>
            </li>

            <li class="py-1">
                <a href="{{ route('admin.school.index') }}" class="nav-content-item {{ request()->is('admin/school*') ? 'is-active' : '' }}">
                    <i class="fas fa-university pr-3"></i>
                    <span>@lang('content.admin.navigation.schools')</span>
                </a>
            </li>

            <li class="py-1">
                <a href="{{ route('admin.subject.index') }}" class="nav-content-item {{ request()->is('admin/subject*') ? 'is-active' : '' }}">
                    <i class="fas fa-shapes pr-3"></i>
                    <span>@lang('content.admin.navigation.subjects')</span>
                </a>
            </li>

            <li class="py-1">
                <a href="{{ route('admin.student.index') }}" class="nav-content-item {{ request()->is('admin/student*') ? 'is-active' : '' }}">
                    <i class="fas fa-user-friends pr-3"></i>
                    <span>@lang('content.admin.navigation.students')</span>
                </a>
            </li>

            <li class="py-1">
                <a href="{{ route('admin.user.index') }}" class="nav-content-item {{ request()->is('admin/user*') ? 'is-active' : '' }}">
                    <i class="fas fa-user pr-3"></i>
                    <span>@lang('content.admin.navigation.users')</span>
                </a>
            </li>
        </ul>
        <div class="nav-footer">
            <ul class="m-0">
                <li class="py-4">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-content-item">
                        <i class="fas fa-sign-out-alt pr-3"></i>
                        <span>@lang('content.admin.navigation.logout')</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
