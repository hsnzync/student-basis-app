<div class="jumbotron header">
    <div class="container row">
        <div class="col-6 c-header">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="header-component">
                <h1>Practice for your school subjects right now</h1>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                <div class="header-links">
                    <a href="">Learn more</a>
                </div>
            </div>
        </div>

        <div class="col-6 c-header">
            <img class="" src="{{ asset('img/header-feature.png') }}">
        </div>
    </div>
</div>