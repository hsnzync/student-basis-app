@extends('layouts.master')

@section('content')
@include('partials/header-section', ['title' => 'Admin', 'subtitle' => 'courses'])
<div class="main-container">
    <div class="admin-section">
        <a href="{{ route('course.create') }}" class="btn btn-info">Create</a>
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Afbeelding</th>
                <th scope="col">Onderdeel van</th>
                <th scope="col">Naam</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr>
                <th scope="row">{{ $course->id }}</th>
                <td>@if($course->image_url)
                        <img src="/uploads/courses/{{ $course->image_url }}" alt="course" class="c-admin-image" height="50" width="50">
                    @else
                        <img src="http://archwayarete.greatheartsacademies.org/wp-content/uploads/sites/11/2016/11/default-placeholder.png" alt="course" class="c-admin-image" height="50" width="50">
                    @endif
                </td>
                <td>{{ $course->subject->title }}</td>
                <td>{{ $course->title }}</td>
                <td><span class="badge badge-primary">{{ $course->is_active == 1 ? 'Actief' : 'Inactief' }}</span></td>
                <td><a href="/course/{{$course->id}}/edit" class="btn btn-secondary"><i class="fas fa-pen"></i></a></td>
                <td>
                    {!! Form::open(['method' => 'POST']) !!}
                        @csrf
                        @method('DELETE')
    
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash" aria-hidden="true"></i>
                        </button>
                    {!! Form::close() !!}                
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection