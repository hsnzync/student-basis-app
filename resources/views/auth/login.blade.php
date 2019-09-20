@extends('layouts.master')

@section('content')

<div class="main-container auth">
    <div class="form-section">
        <form method="POST" action="{{ route('login') }}" class="col-lg-12">
            @csrf

            <div class="col-md-12 auth-title">
                <h1>Inloggen</h1>
            </div>

            <div class="row">
                <div class="form-group col-lg-5">
                    <label for="email">Emailadres</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="123456@voorbeeld.nl">

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-lg-5">
                    Login met je schoolaccount
                    <br>
                    <a href="https://login.hr.nl/v1/login" style="color:#fff;">Ga naar de schoolpagina</a>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-5">
                    <label for="password">Wachtwoord</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="****">

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group col-lg-12 form-submit-btn">
                <button type="submit" class="main-btn">
                    {{ __('Inloggen') }}
                </button>
                {{-- @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Wachtwoord vergeten?') }}
                    </a>
                @endif --}}
            </div>
        </form>
    </div>
</div>
@endsection
