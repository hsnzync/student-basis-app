@extends('layouts.master')

@section('content')
<div class="main-container">
    @include('partials/header-section', ['title' => 'Vakken', 'subtitle' => false])
    <div class="button-section">
        <a href="{{ route('admin.subject.create') }}" class="btn btn-primary">Toevoegen</a>
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
                <th scope="col">Opleidingsniveau</th>
                <th scope="col">Cursussen</th>
                <th scope="col">Aantal</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

            @foreach($subjects as $subject)
                <tr>
                    <th scope="row">{{ $subject->id }}</th>
                    <td>{{ $subject->title }}</td>
                    <td>{{ $subject->grade->title }}</td>
                    <td>
                        <a href="{{ route('admin.course.index', $subject->id) }}" class="table-list-btn">
                            {{ $subject->courses ? $subject->courses->count() : '' }}

                            {{--  @if( $subject->courses )  --}}
                                {{ $subject->courses->count() > 1 ? 'cursussen' : 'cursus' }}
                            {{--  @endif  --}}
                        </a>
                    </td>
                    <td>{!! $subject->is_active ? '<span class="badge badge-success">Actief</span>' : '<span class="badge badge-secondary">Inactief</span>' !!}</td>
                    <td><a href="{{ route('admin.subject.edit', $subject->id) }}" class="btn btn-secondary"><i class="fas fa-pen"></i></a></td>
                    <td>
                        {!! Form::open(['method' => 'POST', 'route' => ['admin.subject.destroy', $subject->id] ]) !!}
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
