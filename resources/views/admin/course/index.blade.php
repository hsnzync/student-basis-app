@extends('layouts.master')

@section('content')
<div class="main-container">
    @include('partials/header-section', ['title' => 'Cursussen', 'subtitle' => false])
    <div class="button-section">
        <a href="{{ route('subject.index') }}" class="btn btn-primary">Vakken</a>
        <a href="{{ route('course.create') }}" class="btn btn-primary">Toevoegen</a>
    </div>

    @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Naam</th>
                <th scope="col">Vak</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <th scope="row">{{ $course->id }}</th>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->subject->title }}</td>
                    <td>{!! $course->is_active ? '<span class="badge badge-success">Actief</span>' : '<span class="badge badge-secondary">Inactief</span>' !!}</td>
                    <td><a href="{{ route('course.edit', $course->id) }}" class="btn btn-secondary"><i class="fas fa-pen"></i></a></td>
                    <td>
                        {!! Form::open(['method' => 'POST', 'route' => ['course.destroy', $course->id]]) !!}
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