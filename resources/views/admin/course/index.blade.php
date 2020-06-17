@extends('admin.layouts.master')

@section('content')
    @include('partials/header', ['title' => 'Cursussen', 'subtitle' => false])
    <div class="button-section">
        <a href="{{ route('admin.subject.index') }}" class="btn btn-primary">Vakken</a>
        <a href="{{ route('admin.course.create', $subject_id) }}" class="btn btn-primary">Toevoegen</a>
    </div>

    @include('partials/helpers/notifications')

    @if(count($courses) > 0)
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
                        <td><span class="badge badge-{{ $course->is_active ? 'success' : 'secondary' }} p-2">{{ $course->is_active ? 'Actief' : 'Inactief' }}</td>
                        <td><a href="{{ route('admin.course.edit', [$subject_id, $course->id]) }}" class="btn btn-secondary"><i class="fas fa-pen"></i></a></td>
                        <td>
                            {!! Form::open(['method' => 'POST', 'route' => ['admin.course.destroy', $subject_id, $course->id ]]) !!}
                                @csrf
                                @method('DELETE')

                                <action-button :item="{{$course}}" />

                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        @include('partials/helpers/status', ['status' => 'Geen cursussen gevonden'])
    @endif
@endsection
