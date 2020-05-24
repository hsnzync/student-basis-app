@extends('admin.layouts.master')

@section('content')
<div class="main-container">
    @include('partials/header-section', ['title' => 'Scholen', 'subtitle' => false])
    <div class="button-section">
        <a href="{{ route('admin.school.create') }}" class="btn btn-primary">Toevoegen</a>
    </div>

    @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
    @endif

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
                        <td>{!! $school->is_active ? '<span class="badge badge-success">Actief</span>' : '<span class="badge badge-secondary">Inactief</span>' !!}</td>
                        <td><a href="{{ route('admin.school.edit', $school->id) }}" class="btn btn-secondary"><i class="fas fa-pen"></i></a></td>
                        <td>
                            @csrf
                            @method('DELETE')

                            {{-- <button type="button" class="btn btn-danger" @click.prevent="handleModal({{ json_encode($key) }})"> --}}
                            <button type="button" class="btn btn-danger" @click="handleModal({{json_encode($school)}})">
                                <i class="fas fa-trash" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                    {!! Form::close() !!}
                @endforeach
            </tbody>

        </table>
    @else
        @include('partials/helpers/status', ['status' => 'Geen scholen gevonden'])
    @endif
</div>
@endsection
