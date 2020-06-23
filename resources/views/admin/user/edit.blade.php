@extends('admin.layouts.master')

@section('content')
    @include('partials/breadcrumbs', ['title' => 'Gebruikers', 'item' => $user, 'sub_item' => null, 'current_item' => $user->fullname,  'route' => 'admin.user.index'])
    @include('partials/header', ['title' => !$user->id ? 'Toevoegen' : $user->fullname, 'subtitle' => false])
    @include('partials/helpers/validations')
    @include('partials/helpers/notifications')

    <div class="card-body p-0">
        @if( !$user->id )
            {!! Form::model( $user, [ 'route' => 'admin.user.store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'row'] ) !!}
        @else
            {!! Form::model( $user, [ 'route' => [ 'admin.user.update', $user->id ], 'method' => 'PATCH', 'enctype' => 'multipart/form-data', 'class' => 'row'] ) !!}
        @endif

        <div class="col-lg-9 main-body">
            <div class="form-group">
                {!! Form::label('first-name', 'Voornaam') !!}
                {!! Form::text('first_name', $user->first_name, ['class' => 'form-control', 'id' => 'first-name' ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('last-name', 'Achternaam') !!}
                {!! Form::text('last_name', $user->last_name, ['class' => 'form-control', 'id' => 'last-name' ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', $user->email, ['class' => 'form-control' ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Wachtwoord') !!}
                {!! Form::input('password', 'password', null, ['class' => 'form-control', 'id' => 'password' ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password-confirm', 'Bevestig wachtwoord') !!}
                {!! Form::input('password', 'password-confirm', null, ['class' => 'form-control', 'id' => 'password-confirm' ]) !!}
            </div>
            @if(auth()->user()->hasRole('superadmin'))
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="hidden" name="is_admin" value="0">
                        <input type="checkbox" id="is_admin" name="is_admin" class="custom-control-input" value="1" {{ $user_role == 'superadmin' ? 'checked=checked' : '' }}>
                        <label class="custom-control-label" for="is_admin">Superadmin</label>
                    </div>
                </div>
            @endif
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
@endsection
