@extends('admin.layouts.master')

@section('content')
    @include('partials/header', ['title' => 'Vakken', 'subtitle' => false])
    <div class="button-section">
        <a href="{{ route('admin.subject.create') }}" class="btn btn-primary">Toevoegen</a>
    </div>

    @include('partials/helpers/notifications')

    @if(count($subjects) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titel</th>
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
                        <td>
                            <a href="{{ route('admin.course.index', $subject->id) }}" class="table-list-btn">
                                {{ $subject->courses ? $subject->courses->count() : '' }} item(s)
                            </a>
                        </td>
                        <td><span class="badge badge-{{ $subject->is_active ? 'success' : 'secondary' }} p-2">{{ $subject->is_active ? 'Actief' : 'Inactief' }}</td>
                        <td><a href="{{ route('admin.subject.edit', $subject->id) }}" class="btn btn-secondary"><i class="fas fa-pen"></i></a></td>
                        <td>
                            {!! Form::open(['ref' => 'form','method' => 'POST', 'route' => ['admin.subject.destroy', $subject->id] ]) !!}
                                @csrf
                                @method('DELETE')

                                <action-button :item="{{$subject}}" />

                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        @include('partials/helpers/status', ['status' => 'Geen vakken gevonden'])
    @endif
@endsection
