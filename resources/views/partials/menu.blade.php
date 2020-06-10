<!-- Sidebar -->
<div class="nav-main bg-dark col-sm-1 px-4">
    <div class="nav-title py-3"><i class="fab fa-stripe-s"></i></div>
    <div class="nav-content">
        <ul>
            <li class="py-3">
                <a href="{{ route('admin.index') }}" class="nav-content-item {{ request()->is('admin') ? 'is-active' : '' }}"><i class="fas fa-compass"></i></a>
            </li>
            @if(auth()->user()->hasRole('superadmin'))
                <li class="py-3">
                    <a href="{{ route('admin.school.index') }}" class="nav-content-item {{ request()->is('admin/school*') ? 'is-active' : '' }}"><i class="fas fa-university"></i></a>
                </li>
            @endif
            <li class="py-3">
                <a href="{{ route('admin.subject.index') }}" class="nav-content-item {{ request()->is('admin/subject*') ? 'is-active' : '' }}"><i class="fas fa-shapes"></i></a>
            </li>

            <li class="py-3">
                <a href="{{ route('admin.student.index') }}" class="nav-content-item {{ request()->is('admin/student*') ? 'is-active' : '' }}"><i class="fas fa-user-friends"></i></a>
            </li>

            <li class="py-3">
                <a href="{{ route('admin.user.index') }}" class="nav-content-item {{ request()->is('admin/user*') ? 'is-active' : '' }}"><i class="fas fa-user"></i></a>
            </li>
        </ul>
        <ul>
            <li class="py-3">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-content-item"><i class="fas fa-sign-out-alt"></i></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
