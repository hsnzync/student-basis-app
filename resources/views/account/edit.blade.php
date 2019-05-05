@extends('layouts.master')

@section('content')
<div class="main-header">
    <div class="container c-profile-container">
        <div class="col-xl row justify-content-md-center">
            <ul class="col-xl text-center">
                <div class="c-profile-header">
                    <div class="c-profile-header-avatar">
                        <li><img src="/uploads/avatars/{{ $user->avatar }}" alt="avatar" class="rounded-circle c-avatar"></li>
                    </div>
                    <div class="c-profile-header-details">
                        <li>{{ $user->username }}</li>
                        @foreach($user->roles as $role)
                            @if($role->id == 1)
                                <li>Level {{ $user->level }}</li>
                            @endif
                        @endforeach
                    </div>
                </div>
            </ul>
        </div>
    </div>
</div>

<div class="c-profile-activity">
    <div class="row c-profile-activity-container justify-content-md-center">
        <div class="card">
            <h5 class="card-header">Edit profile</h5>
            <div class="card-body">
                {!! Form::open(['class' => 'c-form-edit', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'url' => 'profile/'.$user->id ]) !!}
                @csrf
                @method('PATCH')
                <ul>
                    <li>Avatar: {!! Form::file('avatar', ['accept' => 'image/*']) !!}</li>
                    <li>Username: {!! Form::text('username', $user->username, ['class' => 'form-control' ]) !!}</li>
                    <li>Email: {!! Form::text('email', $user->email, ['class' => 'form-control' ]) !!}</li>
                </ul>
                <button type="submit" class="btn-enter">Save</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection