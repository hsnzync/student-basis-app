@extends('layouts.master')

@section('content')
    <div class="main-container">
        {{-- @include('partials/header-section', ['title' => !$user->id ? 'Toevoegen' : $user->fullname . ' bewerken', 'subtitle' => false]) --}}
        // ADMIN HEADER TOEVOEGEN MET ONDERSTE STUK
        @if( !$user->id )
            <h1>Nieuwe gebruiker toevoegen</h1>
        @else
            <h1>{{ $user->fullname }} bewerken</h1>
        @endif

        <div class="button-section col-lg-12">
            <a href="{{ route('admin.user.index') }}" class="btn btn-primary">Overzicht</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger errors">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if (session('status'))
            <div class="alert alert-success success">
                {{ session('status') }}
            </div>
        @endif

        <div class="col-lg-12">
            @if( !$user->id )
                {!! Form::model( $user, [ 'route' => 'admin.user.store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'row'] ) !!}
            @else
                {!! Form::model( $user, [ 'route' => [ 'admin.user.update', $user->id ], 'method' => 'PATCH', 'enctype' => 'multipart/form-data', 'class' => 'row'] ) !!}
            @endif

            <div class="col-lg-9 main-body">
                <div class="form-group">
                    {!! Form::label('first-name', 'Voornaam:') !!}
                    {!! Form::text('first_name', $user->first_name, ['class' => 'form-control', 'id' => 'first-name' ]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('last-name', 'Achternaam:') !!}
                    {!! Form::text('last_name', $user->last_name, ['class' => 'form-control', 'id' => 'last-name' ]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Emailadres:') !!}
                    {!! Form::email('email', $user->email, ['class' => 'form-control' ]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Wachtwoord:') !!}
                    {!! Form::input('password', 'password', null, ['class' => 'form-control', 'id' => 'password' ]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password-confirm', 'Bevestig wachtwoord:') !!}
                    {!! Form::input('password', 'password-confirm', null, ['class' => 'form-control', 'id' => 'password-confirm' ]) !!}
                </div>
            </div>

            <div class="col-lg-3 main-body">
                <div class="form-group">
                    {!! Form::label('level', 'Level:') !!}
                    {!! Form::text('level', $user->level, ['class' => 'form-control' ]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('experience_points', 'Punten:') !!}
                    {!! Form::text('experience_points', $user->experience_points, ['class' => 'form-control' ]) !!}
                </div>

                <div class="form-group">
                    {!! Form::select('school_id', $schools, $user->school_id, ['class' => 'form-control', 'placeholder'=>'Selecteer school']) !!}
                </div>

                <div class="form-group">
                    {!! Form::select('grade_id', $grades, $user->grade_id, ['class' => 'form-control', 'placeholder'=>'Selecteer onderwijsniveau']) !!}
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" id="is_active" name="is_active" class="custom-control-input" value="1" {{ $user->is_active ? 'checked=checked' : '' }}>
                        <label class="custom-control-label" for="is_active">Activeer</label>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <button type="submit" class="btn-enter btn btn-primary">Save</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
