@extends('layouts.master')

@section('content')
@include('partials/header-section', ['title' => 'Admin', 'subtitle' => $subject->title])
    <div class="main-container">
        <div class="card-body">
            {!! Form::open(['class' => 'c-form-edit', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'url' => 'subject/' . $subject->id]) !!}
            @csrf
            @method('PATCH')

            <div class="form-group">
                {!! Form::label('form-file', 'Afbeelding:') !!}
                <br>
                {!! Form::file('image_url', ['accept' => 'image/*', 'class' => 'form-control-file', 'id' => 'form-file']) !!}
            </div>

            <div class="form-group">
                @if($subject->image_url)
                    <img src="/uploads/subjects/{{ $subject->image_url }}" alt="subject" class="c-admin-image" height="200" width="200">
                @else
                    <img src="http://archwayarete.greatheartsacademies.org/wp-content/uploads/sites/11/2016/11/default-placeholder.png" alt="subject" class="c-admin-image" height="200" width="200">
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('title', 'Naam:') !!}
                {!! Form::text('title', $subject->title, ['class' => 'form-control', 'id' => 'title' ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Omschrijving:') !!}
                {!! Form::textarea('description', $subject->description, ['class' => 'form-control' ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('slug', 'Url:') !!}
                {!! Form::text('slug', $subject->slug, ['class' => 'form-control' ]) !!}
                <p class="form-url-text">Kleine letters, spaties vervangen met een '-'</p>
            </div>

            <div class="form-group">
                {!! Form::select('programme_id', $programmes, null, ['class' => 'form-control']) !!}
            </div>

                <button type="submit" class="btn-enter btn btn-primary">Save</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection