@extends('layouts.master')

@section('content')
<div class="main-container">
    @include('partials/header-section', ['title' => 'Beschikbare vakken'])
    @include('partials.search')
    @include('partials/filter')
    
    <div class="main-section main-block">
        <div class="col-12 row">
            @foreach($subjects as $subject)
                @if($subject->courses->count())
                    <div class="main-features-wrapper main-block-wrapper col-lg-4">
                        <a href="browse/{{$subject->slug}}" class="browse-item">
                            <div class="col-12 main-block-section">
                                <div class="main-block-image-section">
                                    @if($subject->image_url)
                                        <img src="/uploads/subjects/{{ $subject->image_url }}" alt="{{ $subject->slug }}">
                                    @else
                                        <img src="/uploads/fallback/fallback.jpg" alt="{{ $subject->slug }}">
                                    @endif
                                </div>
                                <div class="main-block-text">
                                    <h4>{{ $subject->title }}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="col-12 main-features-section-btn">
            <a class="features-btn" href="#">Learn more</a>
        </div>
    </div>
</div>
@endsection