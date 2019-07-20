@extends('layouts.master')

@section('content')

<div class="main-container auth">
    <div class="form-section col-lg-4">
        <div class="container">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="col-md-12 auth-title text-center">
                    <h1>Registreren</h1>
                </div>

                <div class="form-group col-md-12">
                    <label for="username">Gebruikersnaam</label>
                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus placeholder="Gebruikersnaam">

                    @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group col-md-12">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email adres">

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group col-md-12">
                    <label for="student_number">Studentnummer</label>
                    <input id="student_number" type="text" class="form-control{{ $errors->has('student_number') ? ' is-invalid' : '' }}" name="student_number" required placeholder="Studentnummer">

                    @if ($errors->has('student_number'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('student_number') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group col-md-12">
                    <label for="password">Wachtwoord</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Wachtwoord">

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group col-md-12">
                    <label for="password-confirm">Wachtwoord bevestigen</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Bevestig wachtwoord">
                </div>

                <div class="form-group col-md-12">
                    <label for="school">School</label>
                    {!! Form::select('school_id', $schools, null, ['class' => 'form-control js-schools $errors->has("school_id") ? " is-invalid" : "" ', 'placeholder'=>'Selecteer school']) !!}
                </div>

                <div class="form-group col-md-12 js-programmes-form hide">
                    <label for="programme">Opleiding</label>
                    <select class="form-control js-programmes-overview" name="programme_id"></select>
                </div>

                <div class="form-group col-md-12 text-center form-submit-btn">
                    <button type="submit" class="main-btn">
                        {{ __('Registreren') }}
                    </button>

                    {{-- <a class="btn btn-link" href="{{ route('login') }}">
                        Al een account? klik hier
                    </a> --}}
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
    @parent
    
        var registration_func = new registration();
        registration_func.init();

@stop