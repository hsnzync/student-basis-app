<!-- Sidebar -->
<div class="bg-dark sidebar-nav" id="sidebar-wrapper">
    <div class="sidebar-heading">Admin overzicht</div>
    <div class="list-group list-group-flush">
        <ul>
            <li>
                <a href="{{ route('home.index') }}" class="list-group-item list-group-item-action bg-dark{{ request()->is('admin/home*') ? 'is-active' : '' }}">Overzicht</a>
            </li>
            <li class="list-group-head">Onderdelen</li>
            @if(Auth::user()->is_has_permission)
                <li>
                    <a href="{{ route('school.index') }}" class="list-group-item list-group-item-action bg-dark{{ request()->is('admin/school*') ? 'is-active' : '' }}">Scholen</a>
                </li>
                <li>
                    <a href="{{ route('programme.index') }}" class="list-group-item list-group-item-action bg-dark{{ request()->is('admin/programme*') ? 'is-active' : '' }}">Opleidingen</a>
                </li>
            @endif
            <li>
                <a href="{{ route('subject.index') }}" class="list-group-item list-group-item-action bg-dark{{ request()->is('admin/subject*') ? 'is-active' : '' }}">Vakken</a>
            </li>

            <li class="list-group-head">Algemeen</li>
            <li>
                <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action bg-dark{{ request()->is('admin/user*') ? 'is-active' : '' }}">Gebruikers</a>
            </li>

            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="list-group-item list-group-item-action bg-dark alt-btn">Uitloggen</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>