<!-- Sidebar -->
<div class="bg-dark sidebar-nav" id="sidebar-wrapper">
    <div class="sidebar-heading">Admin overzicht</div>
    <div class="list-group list-group-flush">
        <ul>
            <li>
                <a href="{{ route('admin.index') }}" class="list-group-item list-group-item-action {{ request()->is('admin') ? 'is-active' : 'bg-dark' }}">Overzicht</a>
            </li>
            <li class="list-group-head">Onderdelen</li>
            @if(auth()->user()->hasRole('superadmin'))
                <li>
                    <a href="{{ route('admin.school.index') }}" class="list-group-item list-group-item-action {{ request()->is('admin/school*') ? 'is-active' : 'bg-dark' }}">Scholen</a>
                </li>
            @endif
            <li>
                <a href="{{ route('admin.subject.index') }}" class="list-group-item list-group-item-action {{ request()->is('admin/subject*') ? 'is-active' : 'bg-dark' }}">Vakken</a>
            </li>

            <li>
                <a href="{{ route('admin.student.index') }}" class="list-group-item list-group-item-action {{ request()->is('admin/student*') ? 'is-active' : 'bg-dark' }}">Leerlingen</a>
            </li>

            <li class="list-group-head">Algemeen</li>
            <li>
                <a href="{{ route('admin.user.index') }}" class="list-group-item list-group-item-action {{ request()->is('admin/user*') ? 'is-active' : 'bg-dark' }}">Gebruikers</a>
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
