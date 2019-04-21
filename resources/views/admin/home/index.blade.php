@extends('layouts.master')

@section('content')
@include('partials/header-section', ['title' => 'Admin panel', 'subtitle' => null])
<div class="main-container">
    <div class="c-section row">

        <a href="{{ route('school.index') }}" class="c-admin-anchor col-4">
            <div class="c-admin ">
                <h5>Scholen <span class="badge badge-primary">{{ $school_count }}</span></h5>
            </div>
        </a>

        <a href="{{ route('programme.index') }}" class="c-admin-anchor col-4">
            <div class="c-admin ">
                <h5>Opleidingen <span class="badge badge-primary">{{ $programme_count }}</span></h5>
            </div>
        </a>

        <a href="{{ route('subject.index') }}" class="c-admin-anchor col-4">
            <div class="c-admin ">
                <h5>Vakken <span class="badge badge-primary">{{ $subject_count }}</span></h5>
            </div>
        </a>
    </div>
</div>
@endsection