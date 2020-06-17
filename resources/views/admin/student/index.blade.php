@extends('admin.layouts.master')

@section('content')
    @include('partials/header', ['title' => 'Studenten', 'subtitle' => false])
    <div class="button-section">
        <a href="{{route('admin.student.create')}}" class="btn btn-primary">Toevoegen</a>
    </div>

    @include('partials/helpers/notifications')

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
                    <td><span class="badge badge-{{ $student->is_active ? 'success' : 'secondary' }} p-2">{{ $student->is_active ? 'Actief' : 'Inactief' }}</td>
                    <td><a href="{{ route('admin.student.edit', $student->id) }}" class="btn btn-secondary"><i class="fas fa-pen"></i></a></td>
                    {!! Form::open(['method' => 'POST', 'route' => ['admin.student.destroy', $student->id] ]) !!}
                    <td>
                        @csrf
                        @method('DELETE')

                        <action-button :item="{{$student}}" />

                    </td>

                    {!! Form::close() !!}
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        @include('partials/helpers/status', ['status' => 'Geen studenten gevonden'])
    @endif
@stop
