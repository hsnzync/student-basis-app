@extends('layouts.master')

@section('content')
    <div class="main-container">
        @include('partials/header-section', ['title' => !$user->id ? 'Toevoegen' : $user->username, 'subtitle' => false])
        <div class="button-section">
            <a href="{{ route('user.index') }}" class="btn btn-primary">Overzicht</a>
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

        <div class="card-body">

            @if( !$user->id )
                {!! Form::model( $user, [ 'route' => 'user.store', 'method' => 'POST', 'enctype' => 'multipart/form-data'] ) !!}
            @else
                {!! Form::model( $user, [ 'route' => [ 'user.update', $user->id ], 'method' => 'PATCH', 'enctype' => 'multipart/form-data'] ) !!}
            @endif

            <div class="form-group">
                {!! Form::label('username', 'Gebruikersnaam:') !!}
                {!! Form::text('username', $user->username, ['class' => 'form-control', 'id' => 'username' ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('student_number', 'Studentnummer:') !!}
                {!! Form::number('student_number', $user->student_number, ['class' => 'form-control' ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Emailadres:') !!}
                {!! Form::email('email', $user->email, ['class' => 'form-control' ]) !!}
            </div>

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
                {!! Form::select('programme_id', $programmes, $user->programme_id, ['class' => 'form-control', 'placeholder'=>'Selecteer opleiding']) !!}
            </div>

            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" id="is_active" name="is_active" class="custom-control-input" value="1" {{ $user->is_active ? 'checked=checked' : '' }}>
                    <label class="custom-control-label" for="is_active">Activeer</label>
                </div>
            </div>

            <button type="submit" class="btn-enter btn btn-primary">Save</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection