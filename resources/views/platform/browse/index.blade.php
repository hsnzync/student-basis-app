@extends('layouts.master')

@section('content')
    <base-component :initial="{{ $subjects->first() }}"></base-component>
@endsection
