@extends('layouts.master')

@section('content')
@foreach($subjects as $subject)
    @include('partials/header-section', ['title' => 'Vakken', 'subtitle' => null])
@endforeach
<div class="main-container">
    @include('partials.search')
    <div class="col-sm-12 row">
        @foreach($subjects as $subject)
            @if($subject->courses->count())
                @foreach($subject->courses as $course)
                <div class="col-md-4 education-block">
                    <a href="browse/{{$subject->slug}}" class="browse-item">
                        <div class="card">
                            @if($subject->image_url)
                                <div class="card-body" style="background-image: url('/uploads/subjects/{{ $subject->image_url }}')">
                            @else
                                <div class="card-body" style="background-image: url('/uploads/fallback/fallback.jpg')">
                            @endif
                                <div class="card-content">
                                    <h5 class="card-title">{{ $subject->title }}</h5>
                                    <p>{{ $subject->description }}</p>
                                    <p><span class="badge badge-primary">{{ $subject->courses->count() > 1 ? $subject->courses->count() .' ' . 'cursussen' : $subject->courses->count() . ' ' . 'cursus' }} beschikbaar</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            @endif
        @endforeach
    </div>
</div>
@endsection