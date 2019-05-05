@extends('layouts.master')

@section('content')
@include('partials/header-section', ['title' => 'Admin', 'subtitle' => 'scholen'])
<div class="main-container">
    <div class="admin-section">
        {{-- <a href="" class="btn btn-info">Create</a> --}}
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
            <th scope="col">Naam</th>
            <th scope="col">Locatie</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($schools as $school)
                <tr>
                <th scope="row">{{ $school->id }}</th>
                <td>{{ $school->title }}</td>
                <td>{{ $school->location }}</td>
                <td><span class="badge badge-primary">{{ $school->is_active == 1 ? 'Actief' : 'Inactief' }}</span></td>
                <td><a href="school/{{$school->slug}}/edit" class="btn btn-secondary"><i class="fas fa-pen"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection