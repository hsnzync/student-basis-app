@extends('admin.layouts.master')

@section('content')
    @include('partials/breadcrumbs', ['title' => 'Vakken', 'item' => $subject, 'sub_item' => null, 'current_item' => $subject->title, 'route' => 'admin.subject.index'])
    @include('partials/header', ['title' => !$subject->id ? 'Toevoegen' : $subject->title, 'subtitle' => false])
    @include('partials/helpers/validations')
    @include('partials/helpers/notifications')

    <div class="card-body p-0">
        @if( !$subject->id )
            {!! Form::model( $subject, [ 'route' => 'admin.subject.store', 'method' => 'POST', 'enctype' => 'multipart/form-data'] ) !!}
        @else
            {!! Form::model( $subject, [ 'route' => [ 'admin.subject.update', $subject->id ], 'method' => 'PATCH', 'enctype' => 'multipart/form-data'] ) !!}
        @endif

        <div class="form-group">
            {!! Form::label('form-file', 'Afbeelding') !!}
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
            {!! Form::label('title', 'Titel') !!}
            {!! Form::text('title', $subject->title, ['class' => 'form-control', 'id' => 'title' ]) !!}
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
@endsection
