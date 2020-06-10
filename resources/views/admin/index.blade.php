@extends('admin.layouts.master')

@section('content')
@include('partials/header', ['title' => 'Overzicht', 'subtitle' => 'Welkom, ' . Auth::user()->first_name . ' ' . Auth::user()->last_name])
<div class="main-container">
    <div class="col-12 row admin-overview">
        {{-- Admin content --}}
    </div>
</div>
@endsection
