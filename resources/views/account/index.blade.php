@extends('layouts.master')

@section('content')
@include('partials/header-section', ['title' => 'Profiel', 'subtitle' => null])
<div class="main-header">
    <div class="container c-profile-container">
        <div class="col-xl row justify-content-md-center text-center">
            <ul class="col-xl">
            @foreach($users as $user)
                <div class="c-profile-header">
                    <div class="c-profile-header-avatar">
                        <li><img src="uploads/avatars/{{ $user->avatar }}" alt="avatar" class="rounded-circle c-avatar"></li>
                    </div>
                    <div class="c-profile-header-details">
                        <li>{{ $user->username }}</li>
                        <li>{{ $user->school->title }}</li>
                        {{-- <div class="c-profile-header-details-personal">
                            <li>{{ $user->first_name }}</li>
                            <li>{{ $user->last_name }}</li>
                        </div>
                        <li>{{ $user->student_number }}</li> --}}

                        @if($user->role == 1)
                        <li>Level {{ $user->level }}</li>
                        @endif
                    </div>
                </div>
            @endforeach
                <li class="c-link-user"><a href="profile/{{$user->id}}/edit">Edit profile</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="c-profile-activity">
    <div class="row">
        <div class="card col-4">
            <div class="card-body">
                <h5 class="card-title">Achievement 1</h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>
</div>
@endsection