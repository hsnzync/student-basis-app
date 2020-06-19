@extends('admin.layouts.master')

@section('content')
    @include('partials/breadcrumbs', ['title' => 'Scholen', 'item' => $school, 'sub_item' => null, 'current_item' => $school->title, 'route' => 'admin.school.index'])
    @include('partials/header', ['title' => !$school->id ? 'Toevoegen' : $school->title, 'subtitle' => false])
    @include('partials/helpers/validations')
    @include('partials/helpers/notifications')

    <div class="card-body p-0">
        @if( !$school->id )
            {!! Form::model( $school, [ 'route' => 'admin.school.store', 'method' => 'POST', 'enctype' => 'multipart/form-data'] ) !!}
        @else
            {!! Form::model( $school, [ 'route' => [ 'admin.school.update', $school->id ], 'method' => 'PATCH', 'enctype' => 'multipart/form-data'] ) !!}
        @endif

        <div class="form-group">
            {!! Form::label('title', 'Naam:') !!}
            {!! Form::text('title', $school->title, ['class' => 'form-control', 'id' => 'title' ]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('location', 'Locatie:') !!}
            {!! Form::text('location', $school->location, ['class' => 'form-control' ]) !!}
        </div>

    <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" id="is_active" name="is_active" class="custom-control-input" value="1" {{ $school->is_active ? 'checked=checked' : '' }}>
                <label class="custom-control-label" for="is_active">Activeer</label>
            </div>
        </div>

        <button type="submit" class="btn-enter btn btn-primary">Save</button>
        {!! Form::close() !!}
    </div>
@endsection
