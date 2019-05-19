@extends('layouts.master')

@section('content')
@include('partials/header-section', ['title' => 'Admin', 'subtitle' => 'vakken'])
<div class="main-container">
    <div class="admin-section">
        <a href="{{route('subject.create')}}" class="btn btn-info">Nieuw</a>
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
                <th scope="col">Onderdeel van</th>
                <th scope="col">Naam</th>
                <th scope="col">Cursussen</th>
                {{-- <th scope="col">Status</th> --}}
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($subjects as $subject)
                <tr>
                <th scope="row">{{ $subject->id }}</th>
                <td>@if($subject->image_url)
                        <img src="/uploads/subjects/{{ $subject->image_url }}" alt="subject" class="c-admin-image" height="50" width="50">
                    @else
                        <img src="http://archwayarete.greatheartsacademies.org/wp-content/uploads/sites/11/2016/11/default-placeholder.png" alt="subject" class="c-admin-image" height="50" width="50">
                    @endif
                </td>
                <td>{{ $subject->programme->title }}</td>
                <td>{{ $subject->title }}</td>
                <td><a href="course/{{$subject->id}}/"><i class="fas fa-list"></i></a></td>
                {{-- <td><span class="badge badge-primary">{{ $subject->is_active == 1 ? 'Actief' : 'Inactief' }}</span></td> --}}
                <td><a href="subject/{{$subject->id}}/edit" class="btn btn-secondary"><i class="fas fa-pen"></i></a></td>
                <td>
                    {!! Form::open(['method' => 'POST', 'url' => 'subject/' . $subject->id]) !!}
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