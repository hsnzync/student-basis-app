@extends('admin.layouts.master')

@section('content')
    <div class="main-container" id="main">
        @include('partials/header-section', ['title' => 'Gebruikers', 'subtitle' => false])
        <div class="button-section">
            <a href="{{route('admin.student.create')}}" class="btn btn-primary">Toevoegen</a>
        </div>

        @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif
        @if(count($students) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Naam</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($students as $student)
                        <tr>
                        <th scope="row">{{ $student->id }}</th>
                        </td>
                        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{!! $student->is_active ? '<span class="badge badge-success">Actief</span>' : '<span class="badge badge-secondary">Inactief</span>' !!}</td>
                        <td><a href="{{ route('admin.student.edit', $student->id) }}" class="btn btn-secondary"><i class="fas fa-pen"></i></a></td>
                        {!! Form::open(['method' => 'POST', 'route' => ['admin.student.destroy', $student->id] ]) !!}
                        <td>
                            @csrf
                            @method('DELETE')

                            <button type="button" class="btn btn-danger">
                                <i class="fas fa-trash" aria-hidden="true"></i>
                            </button>
                        </td>

                        {!! Form::close() !!}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            @include('partials/helpers/status', ['status' => 'Geen studenten gevonden'])
        @endif
    </div>
@stop
