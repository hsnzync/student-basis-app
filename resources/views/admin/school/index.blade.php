@extends('admin.layouts.master')

@section('content')
    <div class="mb-5">
        @include('partials/header', ['title' => 'Scholen', 'subtitle' => false])
        @include('partials/actions-button', ['route' => 'admin.school.create', 'sub_item' => null, 'type' => 'primary', 'text' => 'Toevoegen'])
    </div>

    @include('partials/helpers/notifications')

    @if(count($schools) > 0)

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
                @foreach($schools as $key => $school)
                {!! Form::open(['method' => 'POST', 'route' => ['admin.school.destroy', $school->id] ]) !!}
                    <tr>
                        <th scope="row">{{ $school->id }}</th>
                        <td>{{ $school->title }}</td>
                        <td><span class="badge badge-{{ $school->is_active ? 'success' : 'secondary' }} p-2">{{ $school->is_active ? 'Actief' : 'Inactief' }}</td>
                        <td><a href="{{ route('admin.school.edit', $school->id) }}" class="btn btn-secondary"><i class="fas fa-pen"></i></a></td>
                        <td>
                            @csrf
                            @method('DELETE')

                            <actions-button :item="{{$school}}" />

                        </td>
                    </tr>
                    {!! Form::close() !!}
                @endforeach
            </tbody>
        </table>
    @else
        @include('partials/helpers/empty-placeholder', ['status' => 'Geen scholen gevonden'])
    @endif
@endsection
