@extends('admin.layouts.master')

@section('content')
    <div class="main-container" id="main">
        @include('partials/header', ['title' => 'Gebruikers', 'subtitle' => false])
        <div class="button-section">
            <a href="{{route('admin.user.create')}}" class="btn btn-primary">Toevoegen</a>
        </div>

        @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif
        @if(count($users) > 0)
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

                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            </td>
                            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><span class="badge badge-{{ $user->is_active ? 'success' : 'secondary' }} p-2">{{ $user->is_active ? 'Actief' : 'Inactief' }}</td>
                            <td>
                                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-secondary"><i class="fas fa-pen"></i></a>
                            </td>
                            <td>
                                {!! Form::open(['method' => 'POST', 'route' => ['admin.user.destroy', $user->id] ]) !!}
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
        @else
            @include('partials/helpers/status', ['status' => 'Geen gebruikers gevonden'])
        @endif
    </div>
@stop
