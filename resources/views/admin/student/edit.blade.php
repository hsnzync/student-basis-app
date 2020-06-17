@extends('admin.layouts.master')

@section('content')
    @if( !$student->id )
        <h1>Nieuwe gebruiker toevoegen</h1>
    @else
        <h1>{{ $student->fullname }} bewerken</h1>
    @endif

    <div class="button-section">
        <a href="{{ route('admin.student.index') }}" class="btn btn-primary">Overzicht</a>
    </div>

    @include('partials/helpers/validations')
    @include('partials/helpers/notifications')

    <div class="card-body p-0">
        @if( !$student->id )
            {!! Form::model( $student, [ 'route' => 'admin.student.store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'row'] ) !!}
        @else
            {!! Form::model( $student, [ 'route' => [ 'admin.student.update', $student->id ], 'method' => 'PATCH', 'enctype' => 'multipart/form-data', 'class' => 'row'] ) !!}
        @endif

        <div class="col-lg-9 main-body">
            <div class="form-group">
                {!! Form::label('first-name', 'Voornaam:') !!}
                {!! Form::text('first_name', $student->first_name, ['class' => 'form-control', 'id' => 'first-name' ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('last-name', 'Achternaam:') !!}
                {!! Form::text('last_name', $student->last_name, ['class' => 'form-control', 'id' => 'last-name' ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Emailadres:') !!}
                {!! Form::email('email', $student->email, ['class' => 'form-control' ]) !!}
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
                {!! Form::text('level', $student->level, ['class' => 'form-control' ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('experience_points', 'Punten:') !!}
                {!! Form::text('experience_points', $student->experience_points, ['class' => 'form-control' ]) !!}
            </div>

            <div class="form-group">
                {!! Form::select('school_id', $schools, $student->school_id, ['class' => 'form-control', 'placeholder'=>'Selecteer school']) !!}
            </div>

            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" id="is_active" name="is_active" class="custom-control-input" value="1" {{ $student->is_active ? 'checked=checked' : '' }}>
                    <label class="custom-control-label" for="is_active">Activeer</label>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <button type="submit" class="btn-enter btn btn-primary">Save</button>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
