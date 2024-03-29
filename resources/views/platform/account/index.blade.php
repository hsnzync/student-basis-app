@extends('layouts.master')

@section('content')
    @include('partials/header', ['title' => 'Mijn Profiel', 'subtitle' => false])

    <div class="main-section main-block">
        <div class="col-12 row">
            <div class="container profile-container">
                <div class="col-xl row justify-content-md-center text-center">
                    <ul class="col-xl">
                        <li>
                            @if( $user->avatar )
                                <img src="uploads/avatars/{{ $user->avatar }}" alt="avatar" class="rounded-circle">
                            @else
                                <span class="avatar rounded-circle">{{ auth()->user()->short_name }}</span>
                            @endif
                        </li>
                        <li>{{ $user->first_name }} {{ $user->last_name }}</li>
                        <li>{{ $user->school->title }}</li>
                        <li>Level {{ $user->level }}</li>
                        <li class="link-user"><a href="profile/{{$user->id}}/edit">Edit profile</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
@endsection
