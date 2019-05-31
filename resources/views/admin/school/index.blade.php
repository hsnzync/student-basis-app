@extends('layouts.master')

@section('content')
<div class="main-container">
    @include('partials/header-section', ['title' => 'Scholen', 'subtitle' => false])
    <div class="button-section">
        <a href="{{ route('school.create') }}" class="btn btn-primary">Toevoegen</a>
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
            <th scope="col">Status</th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
        </thead>

        <tbody>
            @foreach($schools as $school)
                <tr>
                    <th scope="row">{{ $school->id }}</th>
                    <td>{{ $school->title }}</td>
                    <td>{!! $school->is_active ? '<span class="badge badge-success">Actief</span>' : '<span class="badge badge-secondary">Inactief</span>' !!}</td>
                    <td><a href="{{ route('school.edit', $school->id) }}" class="btn btn-secondary"><i class="fas fa-pen"></i></a></td>
                    <td>
                        {!! Form::open(['method' => 'POST', 'route' => ['school.destroy', $school->id] ]) !!}
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