@extends('admin.layouts.master')

@section('content')
@include('partials/header-section', ['title' => 'Overzicht', 'subtitle' => 'Welkom, ' . Auth::user()->username])
<div class="main-container">
    <div class="col-12 row admin-overview">
        {{-- Admin content --}}
    </div>
</div>
@endsection
