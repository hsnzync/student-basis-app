@extends('layouts.master')

@section('content')
@foreach($programmes as $programme)
    @include('partials/header-section', ['title' => 'Vakken', 'subtitle' => $programme->title])
@endforeach
<div class="main-container">
    @include('partials.search')
    <div class="col-sm-12 row">
        @foreach($programmes as $programme)
            @foreach($programme->subjects as $subject)
                @if($subject->courses->count())
                    <div class="col-md-4 education-block">
                        <a href="{{$programme->slug}}/{{$subject->slug}}" class="browse-item">
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
                @endif
            @endforeach
        @endforeach
    </div>
</div>
@endsection