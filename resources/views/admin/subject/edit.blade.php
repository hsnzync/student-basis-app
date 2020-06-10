@extends('admin.layouts.master')

@section('content')
    <div class="main-container">
        @include('partials/header', ['title' => !$subject->id ? 'Toevoegen' : $subject->title, 'subtitle' => false])
        <div class="button-section">
            <a href="{{ route('admin.subject.index') }}" class="btn btn-primary">Overzicht</a>
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

            @if( !$subject->id )
                {!! Form::model( $subject, [ 'route' => 'admin.subject.store', 'method' => 'POST', 'enctype' => 'multipart/form-data'] ) !!}
            @else
                {!! Form::model( $subject, [ 'route' => [ 'admin.subject.update', $subject->id ], 'method' => 'PATCH', 'enctype' => 'multipart/form-data'] ) !!}
            @endif

            <div class="form-group">
                {!! Form::label('form-file', 'Afbeelding:') !!}
                <br>
                {!! Form::file('image_url', ['accept' => 'image/*', 'class' => 'form-control-file', 'id' => 'form-file']) !!}
            </div>

            <div class="form-group">
                @if($subject->image_url)
                    <img src="/uploads/images/{{ $subject->image_url }}" alt="subject" class="form-img">
                @else
                    <img src="http://archwayarete.greatheartsacademies.org/wp-content/uploads/sites/11/2016/11/default-placeholder.png" alt="subject" class="form-img">
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
                <p class="form-group-helper">Kleine letters, spaties vervangen met een '-'</p>
            </div>

            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" id="is_active" name="is_active" class="custom-control-input" value="1" {{ $subject->is_active ? 'checked=checked' : '' }}>
                    <label class="custom-control-label" for="is_active">Activeer</label>
                </div>
            </div>

            <button type="submit" class="btn-enter btn btn-primary">Save</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
