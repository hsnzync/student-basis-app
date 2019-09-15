<div class="top-section row">
    <div class="col-md-8 top-section-title {{ request()->route()->getName() == 'platform.browse.index' || request()->route()->getName() == 'platform.course.index' ? 'top-section-block' : '' }}">
        <h1>{{ $title }}</h1>

        @if(request()->route()->getName() == 'platform.browse.index' || 
            request()->route()->getName() == 'platform.course.index')
            @include('partials.search')
        @endif

    </div>

    @if(request()->route()->getName() == 'platform.browse.index' || 
        request()->route()->getName() == 'platform.course.index' )
        <div class="col-md-4 top-section-continue {{ request()->route()->getName() == 'platform.browse.index' || request()->route()->getName() == 'platform.course.index' ? 'top-section-block' : '' }}">
            <h1>Ga verder</h1>
            <p>{{ $previous_item->first()->title }}</p>
            <a href="#">Start</a>
        </div>
    @endif

</div>