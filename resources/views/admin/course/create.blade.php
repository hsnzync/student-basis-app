@extends('layouts.master')

@section('content')
@include('partials/header-section', ['title' => 'Admin', 'subtitle' => 'create new course'])
    <div class="main-container">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <div class="card-body">
            {!! Form::open(['class' => 'c-form-edit', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'url' => 'course' ]) !!}
            @csrf

            <div class="form-group">
                {!! Form::label('form-file', 'Image:') !!}
                <br>
                {!! Form::file('image_url', ['accept' => 'image/*', 'class' => 'form-control-file', 'id' => 'form-file']) !!}
            </div>

            <div class="form-group">
                @if($course->image_url)
                    <img src="/uploads/courses/{{ $course->image_url }}" alt="course" class="c-admin-image" height="200" width="200">
                @else
                    <img src="http://archwayarete.greatheartsacademies.org/wp-content/uploads/sites/11/2016/11/default-placeholder.png" alt="course" class="c-admin-image" height="200" width="200">
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('title', 'Name:') !!}
                {!! Form::text('title', $course->title, ['class' => 'form-control', 'id' => 'title' ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', $course->description, ['class' => 'form-control' ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('slug', 'Url:') !!}
                {!! Form::text('slug', $course->slug, ['class' => 'form-control' ]) !!}
                <p class="form-url-text">Kleine letters, spaties vervangen met een '-'</p>
            </div>

            <div class="form-group">
                {!! Form::select('subject_id', $subjects, null, ['class' => 'form-control']) !!}
            </div>

                <button type="submit" class="btn-enter btn btn-primary">Save</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection