@extends('admin.layouts.master')

@section('content')
    <div class="main-container">
        @include('partials/header', ['title' => !$school->id ? 'Toevoegen' : $school->title, 'subtitle' => false])
        <div class="button-section">
            <a href="{{ route('admin.school.index') }}" class="btn btn-primary">Overzicht</a>
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
    </div>
@endsection
