@extends('layouts.master')

@section('content')
    <base-component :user="{{ auth()->user() }}" :initial="{{ $subject }}">
        {{-- <dashboard :subjects="{{ $count_subjects }}"></dashboard> --}}
    </base-component>
@endsection
