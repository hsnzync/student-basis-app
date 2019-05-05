@extends('layouts.master')

@section('content')
@include('partials/header-section', ['title' => 'Admin', 'subtitle' => 'opleidingen'])
<div class="main-container">
    <div class="admin-section">
        <a href="{{route('programme.create')}}" class="btn btn-info">Nieuw</a>
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Onderdeel van</th>
                <th scope="col">Naam</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($programmes as $programme)
                <tr>
                <th scope="row">{{ $programme->id }}</th>
                <td>{{ $programme->school->title }}</td>
                <td>{{ $programme->title }}</td>
                <td><span class="badge badge-primary">{{ $programme->is_active == 1 ? 'Actief' : 'Inactief' }}</span></td>
                <td><a href="programme/{{$programme->slug}}/edit" class="btn btn-secondary"><i class="fas fa-pen"></i></a></td>
                <td>
                    {!! Form::open(['method' => 'POST', 'url' => 'programme/' . $programme->slug]) !!}
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