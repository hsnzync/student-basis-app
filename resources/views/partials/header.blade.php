<div class="jumbotron header">
    <div class="container row">
        <div class="col-md-6 top-header">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="header-component">
                <h1>Studeren en spelen</h1>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                <div class="header-links">
                    <a class="header-btn" href="">Start nu</a>
                    <a class="header-btn" href="">Lees meer</a>
                </div>
            </div>
        </div>

        <div class="col-md-12 top-header">
            <img class="" src="{{ asset('img/header-feature.png') }}">
        </div>
    </div>
</div>