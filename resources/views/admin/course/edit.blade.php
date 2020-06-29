@extends('admin.layouts.master')

@section('content')
    @include('partials/breadcrumbs', ['title' => 'Cursussen', 'item' => $course, 'sub_item' => $subject_id, 'current_item' => $course->title, 'route' => 'admin.course.index'])
    @include('partials/header', ['title' => !$course->id ? 'Toevoegen' : $course->title, 'subtitle' => false])
    @include('partials/helpers/validations')
    @include('partials/helpers/notifications')

    <div class="card-body p-0">
        @if( !$course->id )
            {!! Form::model( $course, [ 'route' => ['admin.course.store', $subject_id, $course->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'] ) !!}
        @else
            {!! Form::model( $course, [ 'route' => [ 'admin.course.update', $subject_id, $course->id ], 'method' => 'PATCH', 'enctype' => 'multipart/form-data'] ) !!}
        @endif

        <div class="form-group">
            {!! Form::label('title', 'Titel') !!}
            {!! Form::text('title', $course->title, ['class' => 'form-control', 'id' => 'title' ]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('points', 'Aantal punten') !!}
            {!! Form::text('points', $course->points, ['class' => 'form-control' ]) !!}
        </div>

        <color-picker ></color-picker>


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
