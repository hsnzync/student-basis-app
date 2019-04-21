<!-- Sidebar -->
<div class="bg-dark sidebar-nav" id="sidebar-wrapper">
    <div class="sidebar-heading">Admin overzicht</div>
    <div class="list-group list-group-flush">
        <a href="{{ route('home.index') }}" class="list-group-item list-group-item-action bg-dark">Overzicht</a>
        <a href="{{ route('school.index') }}" class="list-group-item list-group-item-action bg-dark">Scholen</a>
        <a href="{{ route('programme.index') }}" class="list-group-item list-group-item-action bg-dark">Opleidingen</a>
        <a href="{{ route('subject.index') }}" class="list-group-item list-group-item-action bg-dark">Vakken</a>
        {{-- <a href="{{ route('course.index') }}" class="list-group-item list-group-item-action bg-dark">Courses</a> --}}
        {{-- id="dropdownMenuButton" data-toggle="dropdown" class="dropdown-toggle--}}
        
        {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
        </div> --}}

        {{-- <a href="#" class="list-group-item list-group-item-action bg-dark">Instellinge</a> --}}
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="list-group-item list-group-item-action bg-dark">Uitloggen</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>