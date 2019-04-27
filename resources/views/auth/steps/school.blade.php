@extends('layouts.master')

@section('content')
    @include('partials/header-section', ['title' => 'Waar zit je op school?', 'subtitle' => null])

    @include('partials/selection', ['entities' => $schools])
@endsection