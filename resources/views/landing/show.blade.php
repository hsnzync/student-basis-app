@extends('layouts.master')

@section('content')
<div class="c-courses-section">
    <a href="/catalog">Back</a>
    @foreach($schools as $school)
        <h1>{{$school->title}}</h1>
    @endforeach
</div>
@endsection