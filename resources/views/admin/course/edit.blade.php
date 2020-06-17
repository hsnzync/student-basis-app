@extends('admin.layouts.master')

@section('content')
    @include('partials/header', ['title' => !$course->id ? 'Toevoegen' : $course->title, 'subtitle' => false])
    <div class="button-section">
        <a href="{{ route('admin.course.index', $subject_id, $course->id) }}" class="btn btn-primary">Overzicht</a>
    </div>

    @include('partials/helpers/validations')
    @include('partials/helpers/notifications')

    <div class="card-body p-0">
        @if( !$course->id )
            {!! Form::model( $course, [ 'route' => ['admin.course.store', $subject_id, $course->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'] ) !!}
        @else
            {!! Form::model( $course, [ 'route' => [ 'admin.course.update', $subject_id, $course->id ], 'method' => 'PATCH', 'enctype' => 'multipart/form-data'] ) !!}
        @endif

        <div class="form-group">
            {!! Form::label('form-file', 'Afbeelding:') !!}
            <br>
            {!! Form::file('image_url', ['accept' => 'image/*', 'class' => 'form-control-file', 'id' => 'form-file']) !!}
        </div>

        <div class="form-group">
            @if($course->image_url)
                <img src="/uploads/images/{{ $course->image_url }}" alt="course" class="form-img">
            @else
                <img src="http://archwayarete.greatheartsacademies.org/wp-content/uploads/sites/11/2016/11/default-placeholder.png" alt="course" class="form-img">
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Naam:') !!}
            {!! Form::text('title', $course->title, ['class' => 'form-control', 'id' => 'title' ]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Omschrijving:') !!}
            {!! Form::textarea('description', $course->description, ['class' => 'form-control' ]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('slug', 'Url:') !!}
            {!! Form::text('slug', $course->slug, ['class' => 'form-control' ]) !!}
            <p class="form-group-helper">Kleine letters, spaties vervangen met een '-'</p>
        </div>

        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="hidden" name="is_unlocked" value="0">
                <input type="checkbox" id="is_unlocked" name="is_unlocked" class="custom-control-input" value="1" {{ $course->is_unlocked ? 'checked=checked' : '' }}>
                <label class="custom-control-label" for="is_unlocked">Beschikbaar</label>
            </div>
        </div>

        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" id="is_active" name="is_active" class="custom-control-input" value="1" {{ $course->is_active ? 'checked=checked' : '' }}>
                <label class="custom-control-label" for="is_active">Activeer</label>
            </div>
        </div>

        <button type="submit" class="btn-enter btn btn-primary">Save</button>
        {!! Form::close() !!}
    </div>
@endsection
