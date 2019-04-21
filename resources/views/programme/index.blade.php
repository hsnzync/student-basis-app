@extends('layouts.master')

@section('content')
@foreach($schools as $school)
    @include('partials/header-section', ['title' => 'Opleidingen', 'subtitle' => $school->title])
@endforeach
<div class="main-container">
    @include('partials.search')
    <div class="col-12 row">
        @foreach($schools as $school)
            @foreach($school->programmes as $programme)
                @if($programme->subjects->count())
                    <div class="col-md-4 education-block">
                        <a href="browse/{{$programme->slug}}" class="browse-item">
                            <div class="card">
                                @if($programme->image_url)
                                    <div class="card-body" style="background-image: url('/uploads/programmes/{{ $programme->image_url }}')">
                                @else
                                    <div class="card-body" style="background-image: url('/uploads/fallback/fallback.jpg')">
                                @endif
                                    <div class="card-content">
                                        <h5 class="card-title">{{ $programme->title }}</h5>
                                        <p><span class="badge badge-primary">{{ $programme->subjects->count() ? $programme->subjects->count() : ''}} beschikbaar</p>
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