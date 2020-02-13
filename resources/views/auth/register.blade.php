@extends('layouts.master')

@section('content')

<div class="main-container auth">
    <div class="form-section">
        <form method="POST" action="{{ route('register') }}" class="col-lg-12">

            @csrf
            <div class="col-md-12 auth-title">
                <h1>Registreren</h1>
            </div>

            <div class="row">
                <div class="form-group col-lg-4">
                    <label for="first_name">Voornaam</label>
                    <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus placeholder="Voornaam">

                    @if ($errors->has('first_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group col-lg-4">
                    <label for="last_name">Achternaam</label>
                    <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus placeholder="Achternaam">

                    @if ($errors->has('last_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-4">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Emailadres">

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-4">
                    <label for="password">Wachtwoord</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Wachtwoord">

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group col-lg-5">
                    <label for="password-confirm">Wachtwoord bevestigen</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Bevestig wachtwoord">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-4">
                    <label for="school">School</label>
                    {!! Form::select('school_id', $schools, null, ['class' => 'form-control', 'placeholder'=>'Kies je school']) !!}
                </div>

                <div class="form-group col-lg-4">
                    <label for="grade">Onderwijsniveau</label>
                    {!! Form::select('grade_id', $grades, null, ['class' => 'form-control', 'placeholder'=>'Kies je onderwijsniveau']) !!}
                </div>
            </div>

            <div class="form-group col-lg-12 form-submit-btn">
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
@endsection

@section('js')
    @parent

        var registration_func = new registration();
        registration_func.init();

@stop
