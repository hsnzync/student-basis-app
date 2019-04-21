@extends('layouts.master')

@section('content')
@include('partials/header-section', ['title' => 'Registreren', 'subtitle' => null])
<div class="main-container">
    <div class="c-form-section">
        <div class="container">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group col-6">
                    {{-- <label for="email">Gebruikersnaam:</label> --}}
                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus placeholder="Gebruikersnaam">

                    @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group col-6">
                    {{-- <label for="email">Email:</label> --}}
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email adres">

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group col-6">
                    {{-- <label for="password-confirm">Studentnummer:</label> --}}
                    <input id="student_number" type="text" class="form-control{{ $errors->has('student_number') ? ' is-invalid' : '' }}" name="student_number" required placeholder="Studentnummer">

                    @if ($errors->has('student_number'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('student_number') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group col-6">
                    {{-- <label for="password">Wachtwoord:</label> --}}
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Wachtwoord">

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group col-6">
                    {{-- <label for="password-confirm">Wachtwoord:</label> --}}
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Bevestig wachtwoord">
                </div>
                <div class="form-group col-6">
                    {{-- <label for="school_id">School:</label> --}}
                    {!! Form::select('school_id',
                        $schools, null, [
                            'placeholder'          => trans('--- Kies een school ---', ['attribute' => lcfirst( trans('db.global.type') )] ), 'class' => 'form-control col-6'
                        ])
                    !!}

                    {{-- <example-component v-bind:schools="'{{ $schools }}'"></example-component> --}}
                </div>

                <div class="form-group col-6">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Registreer') }}
                    </button>

                    <a class="btn btn-link" href="{{ route('login') }}">
                        Al een account? klik hier
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

{{-- @section('js-libraries')
    @parent
    <script src="{{ url('assets/js/checkout/shopping-cart.js') }}"></script>
@stop --}}