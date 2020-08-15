@extends('layouts.master')

@section('content')
    <base-component :initial="{{ $subjects->first() }}">
        <overview></overview>
    </base-component>
@endsection
