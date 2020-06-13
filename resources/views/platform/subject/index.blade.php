@extends('layouts.master')

@section('content')
    <overview :initial="{{ $subjects->first() }}" />
@endsection
