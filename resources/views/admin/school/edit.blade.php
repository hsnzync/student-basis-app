@extends('layouts.master')

@section('content')
@include('partials/header-section', ['title' => 'Admin', 'subtitle' => $school->title])
    <div class="main-container">
        <div class="card-body">
            {!! Form::open(['class' => 'c-form-edit', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'url' => 'school/' . $school->slug]) !!}
            @csrf
            @method('PATCH')
            
            <div class="form-group">
                {!! Form::label('title', 'Naam:') !!}
                {!! Form::text('title', $school->title, ['class' => 'form-control', 'id' => 'title' ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('location', 'Locatie:') !!}
                {!! Form::text('location', $school->location, ['class' => 'form-control' ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('slug', 'Url:') !!}
                {!! Form::text('slug', $school->slug, ['class' => 'form-control' ]) !!}
                <p class="form-url-text">Kleine letters, spaties vervangen met een '-'</p>
            </div>

                <button type="submit" class="btn-enter btn btn-primary">Save</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection