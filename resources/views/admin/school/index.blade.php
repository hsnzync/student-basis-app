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
            <th scope="col">Afbeelding</th>
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
                <th scope="row">
                    @if($school->image_url)
                        <img src="/uploads/schools/{{ $school->image_url }}" alt="school" class="c-admin-image" height="50" width="50">
                    @else
                        <img src="http://archwayarete.greatheartsacademies.org/wp-content/uploads/sites/11/2016/11/default-placeholder.png" alt="school" class="c-admin-image" height="50" width="50">
                    @endif
                </th>
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