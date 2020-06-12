@extends('layouts.master')

@section('content')
    <div class="col-md-4 landing-section">
            <h1>Inloggen</h1>

            @if (session('status'))
                <div class="alert alert-danger errors ml-0">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['method' => 'POST', 'route' => 'login' ]) !!}
                @csrf
                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email' ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Wachtwoord:') !!}
                    {!! Form::input('password', 'password', '', ['class' => 'form-control', 'id' => 'password' ]) !!}
                </div>
                <div class="form-group">
                    <button type="submit" class="main-button">Inloggen</button>
                </div>
            {!! Form::close() !!}
    </div>
    <div class="col-md-8 landing-section">
        <img src="{{ asset('img/header-img.jpg') }}">
    </div>
@endsection
