@extends('layouts.master')

@section('content')
    <div class="col-lg-4 landing-section">
        @include('partials/helpers/notifications')
        @include('partials/forms/login-form')
    </div>
    <div class="col-lg-8 landing-section p-0">
        <img src="{{ asset('img/header-img.jpg') }}">
    </div>
@endsection
