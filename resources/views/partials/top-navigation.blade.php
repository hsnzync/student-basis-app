<nav class="navbar navbar-expand-sm navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ auth()->user() ? '/browse' : '/'  }}">Studentbase</a>
    </div>
</nav>
