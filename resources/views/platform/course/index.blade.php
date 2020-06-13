@extends('layouts.master')

@section('content')
    <div class="main-container">
        @foreach($subjects as $subject)
            @include('partials/header', ['title' => $subject->title, 'previous_item' => $subject->courses])
        @endforeach
        <div class="main-section main-block">
            <div class="col-12 row">
                @foreach($subjects as $subject)
                    @foreach($subject->courses as $course)

                        <div class="main-features-wrapper main-block-wrapper col-lg-3">
                        @if($course->is_unlocked)
                            <a href="{{ $subject->slug . '/' . $course->slug }}" class="browse-item">
                        @endif
                            <div class="col-12 main-block-section {{ $course->is_unlocked ? '' : 'locked' }}">
                                <div class="main-block-image-section">
                                    @if($course->image_url)
                                        <img src="/uploads/images/{{ $course->image_url }}" alt="{{ $course->slug }}">
                                    @else
                                        <img src="/uploads/images/fallback/fallback.jpg" alt="{{ $course->slug }}">
                                    @endif
                                </div>
                                <div class="main-block-text">
                                    <h4>{{ $course->title }}</h4>
                                </div>
                                <div class="progress col-10">
                                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        @if($course->is_unlocked)
                            </a>
                        @endif
                        </div>

                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
@endsection
