@extends('admin.layouts.master')

@section('content')
    <div class="mb-5">
        @include('partials/header', ['title' => 'Gebruikers', 'subtitle' => false])
        @include('partials/actions-button', ['route' => 'admin.user.create', 'sub_item' => null, 'type' => 'primary', 'text' => 'Toevoegen'])
    </div>

    @include('partials/helpers/notifications')

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
                        <td><span class="badge badge-{{ $user->is_active ? 'success' : 'secondary' }}badge">{{ $user->is_active ? 'Actief' : 'Inactief' }}</td>
                        <td>
                            @if(auth()->user()->hasRole('superadmin'))
                                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-secondary"><i class="fas fa-pen"></i></a>
                            @endif
                        </td>
                        <td>
                            @if(auth()->user()->hasRole('superadmin'))
                                {!! Form::open(['method' => 'POST', 'route' => ['admin.user.destroy', $user->id] ]) !!}
                                @csrf
                                @method('DELETE')

                                <actions-button :item="{{$user}}" />

                                {!! Form::close() !!}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        @include('partials/helpers/empty-placeholder', ['status' => 'Geen gebruikers gevonden.'])
    @endif
@stop
