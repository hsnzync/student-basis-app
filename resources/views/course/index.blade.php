@extends('layouts.master')

@section('content')
@foreach($subjects as $subject)
    @include('partials/header-section', ['title' => 'Cursussen', 'subtitle' => $subject->title])
@endforeach
<div class="main-container">
    @include('partials.search')
    <div class="col-sm-12 row">
        @foreach($subjects as $subject)
            @foreach($subject->courses as $course)
                <div class="col-md-4 education-block">
                    <a href="{{ $course->is_unlocked == true ? $subject->slug . '/' . $course->slug : '' }}" class="{{ $course->is_unlocked == true ? 'browse-item' : 'browse-item isDisabled'}}">
                        <div class="card">
                            @if($course->image_url)
                                <div class="card-body" style="background-image: url('/uploads/courses/{{ $course->image_url }}')">
                            @else
                                <div class="card-body" style="background-color: #000">
                            @endif
                                <div class="card-content">
                                    <i class="{{ $course->is_unlocked == false ? 'fas fa-lock' : 'fas fa-unlock' }}"></i>
                                    <h5 class="card-title">{{ $course->title }}</h5>
                                    <p>{{ $course->description }}</p>
                                </div>
                           </div>
                        </div>
                    </a>
                </div>
            @endforeach
        @endforeach
    </div>
</div>
@endsection