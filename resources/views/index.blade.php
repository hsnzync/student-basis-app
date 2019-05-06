@extends('layouts.master')

@section('content')
    @include('partials.header')
    
    <div class="home-container">
        <div class="home-features">
            <div class="container">
                <div class="col-12">
                    @include('partials.features')
                </div>
            </div>
        </div>
    </div>
@endsection
