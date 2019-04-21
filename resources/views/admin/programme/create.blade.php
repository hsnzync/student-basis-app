@extends('layouts.master')

@section('content')
@include('partials/header-section', ['title' => 'Admin', 'subtitle' => 'create new programme'])
    <div class="main-container">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <div class="card-body">
            {!! Form::open(['class' => 'c-form-edit', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'url' => 'programme' ]) !!}
            @csrf

            <div class="form-group">
                {!! Form::label('form-file', 'Image:') !!}
                <br>
                {!! Form::file('image_url', ['accept' => 'image/*', 'class' => 'form-control-file', 'id' => 'form-file']) !!}
            </div>

            <div class="form-group">
                @if($programme->image_url)
                    <img src="/uploads/programmes/{{ $programme->image_url }}" alt="programme" class="c-admin-image" height="200" width="200">
                @else
                    <img src="http://archwayarete.greatheartsacademies.org/wp-content/uploads/sites/11/2016/11/default-placeholder.png" alt="programme" class="c-admin-image" height="200" width="200">
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('title', 'Name:') !!}
                {!! Form::text('title', $programme->title, ['class' => 'form-control', 'id' => 'title' ]) !!}
            </div>

            {{-- <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', $programme->description, ['class' => 'form-control' ]) !!}
            </div> --}}

            <div class="form-group">
                {!! Form::label('slug', 'Url:') !!}
                {!! Form::text('slug', $programme->slug, ['class' => 'form-control' ]) !!}
            </div>
            
            <div class="form-group">
                {!! Form::select('school_id', $schools, null, ['class' => 'form-control']) !!}
            </div>

                <button type="submit" class="btn-enter btn btn-primary">Save</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection