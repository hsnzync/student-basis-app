@extends('layouts.master')

@section('content')
@include('partials/header-section', ['title' => 'Welke opleiding volg je?', 'subtitle' => null])

@include('partials/selection', ['entities' => $programmes])
@endsection