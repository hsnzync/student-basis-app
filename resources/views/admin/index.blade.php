@extends('admin.layouts.master')

@section('content')
@include('partials/header', ['title' => 'Overzicht', 'subtitle' => 'Welkom, ' . Auth::user()->first_name . ' ' . Auth::user()->last_name])
<div class="main-container">
    <div class="col-12 row admin-overview">
        <h5>Er zijn op dit moment:</h5>
        <ul>
            <li>{{ $subjects->count() }} vakken beschikbaar</li>
            <li>{{ $courses->count() }} cursussen beschikbaar</li>
            <li>{{ $students->count() }} gerigstreerde studenten</li>
        </ul>
    </div>
</div>
@endsection
