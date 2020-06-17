@extends('layouts.master')

@section('content')
    <div class="col-md-4 landing-section">
        <h1>Inloggen</h1>
        @include('partials/helpers/notifications')
        @include('partials/forms/login-form')
    </div>
    <div class="col-md-8 landing-section">
        <img src="{{ asset('img/header-img.jpg') }}">
    </div>
@endsection
