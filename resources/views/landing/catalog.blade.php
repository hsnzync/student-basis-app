@extends('layouts.master')

@section('content')
    @include('partials/header-section', ['title' => 'Catalog', 'subtitle' => null])
    <div class="c-section row">

        @foreach($schools as $school)
        <div class="col-sm-3">
            <a href="{{$school->slug}}" class="browse-item">
                <div class="card">
                    <div class="card-body" style="background-image: url('/uploads/schools/{{ $school->image_url }}')">
                        <h5 class="card-title">{{ $school->title }}</h5>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
@endsection