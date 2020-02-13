@extends('layouts.master')

@section('content')
<div class="main-container">
    @include('partials/header-section', ['title' => 'Opleidingen', 'subtitle' => false])
    <div class="button-section">
        <a href="{{ route('admin.grade.create') }}" class="btn btn-primary">Toevoegen</a>
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
                <th scope="col">Titel</th>
                <th scope="col">School</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

            @foreach($grades as $grade)
                <tr>
                <th scope="row">{{ $grade->id }}</th>
                <td>{{ $grade->title }}</td>
                <td>{!! $grade->is_active ? '<span class="badge badge-success">Actief</span>' : '<span class="badge badge-secondary">Inactief</span>' !!}</td>
                <td><a href="{{ route('admin.grade.edit', $grade->id) }}" class="btn btn-secondary"><i class="fas fa-pen"></i></a></td>
                <td>
                    {!! Form::open(['method' => 'POST', 'route' => ['admin.grade.destroy', $grade->id] ]) !!}
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
