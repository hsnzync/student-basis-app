@extends('layouts.master')

@section('content')
<div class="main-container">
    @include('partials/header-section', ['title' => 'Mijn Profiel', 'subtitle' => false])

    <div class="main-section main-block">
        <div class="col-12 row">
            <div class="container profile-container">
                <div class="col-xl row justify-content-md-center text-center">
                    <ul class="col-xl">
                        <li><img src="uploads/avatars/{{ $user->avatar }}" alt="avatar" class="rounded-circle"></li>
                        <li>{{ $user->first_name }} {{ $user->last_name }}</li>
                        <li>{{ $user->school->title }}</li>
                        <li>Level {{ $user->level }}</li>
                        <li class="link-user"><a href="profile/{{$user->id}}/edit">Edit profile</a></li>
                    </ul>
                </div>
            </div>

            <div class="profile-activity">
                @include('partials.sections.cards')
            </div>

        </div>
    </div>
</div>
@endsection
