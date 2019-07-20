@extends('layouts.master')

@section('content')
<div class="main-container">
    @include('partials/header-section', ['title' => 'Vakken', 'previous_item' => $subjects])
    
    @include('partials/filter')
    <div class="main-section main-block">
        <div class="col-12 row js-subjects-overview">
            {{-- Loaded async via JS --}}
        </div>
        <div class="col-12 main-features-section-btn">
            <a class="features-btn js-load-subjects" href="#">Load more</a>
        </div>
    </div>
</div>
@endsection

@section('js')
@parent

    var cards_func = new cards();
    cards_func.init( {{ Auth::user()->id }} );
    
@endsection