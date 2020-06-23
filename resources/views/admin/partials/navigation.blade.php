<!-- Sidebar -->
<div class="nav-main bg-dark px-0">
    <div class="nav-content">
        <ul class="nav-items">
            <li class="py-1">
                <span class="nav-content-item title">
                    <i class="fab fa-stripe-s"></i>
                </span>
            </li>
            <li class="py-1">
                <a href="{{ route('admin.index') }}" class="nav-content-item {{ request()->is('admin') ? 'is-active' : '' }}"><i class="fas fa-compass"></i></a>
                Dashboard
            </li>
            @if(auth()->user()->hasRole('superadmin'))
                <li class="py-1">
                    <a href="{{ route('admin.school.index') }}" class="nav-content-item {{ request()->is('admin/school*') ? 'is-active' : '' }}"><i class="fas fa-university"></i></a>
                    Scholen
                </li>
            @endif
            <li class="py-1">
                <a href="{{ route('admin.subject.index') }}" class="nav-content-item {{ request()->is('admin/subject*') ? 'is-active' : '' }}"><i class="fas fa-shapes"></i></a>
                Vakken
            </li>

            <li class="py-1">
                <a href="{{ route('admin.student.index') }}" class="nav-content-item {{ request()->is('admin/student*') ? 'is-active' : '' }}"><i class="fas fa-user-friends"></i></a>
                Studenten
            </li>

            <li class="py-1">
                <a href="{{ route('admin.user.index') }}" class="nav-content-item {{ request()->is('admin/user*') ? 'is-active' : '' }}"><i class="fas fa-user"></i></a>
                Gebruikers
            </li>
        </ul>
        <div class="nav-footer">
            <ul class="m-0">
                <li class="py-4">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-content-item"><i class="fas fa-sign-out-alt"></i></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    Uitloggen
                </li>
            </ul>
        </div>
    </div>
</div>
