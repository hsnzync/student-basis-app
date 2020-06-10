@extends('layouts.master')

@section('content')
<div class="cards">
    @include('partials/header', ['title' => 'Waar wil je vandaag voor oefenen?', 'subtitle' => false])
    <div class="card-search row justify-content-center">
        {{-- <input type="text" placeholder="Zoeken naar een vak.."><button type="button">Zoeken</button> --}}
        <div class="form-group col-sm-5">
            {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Zoeken..' ]) !!}
        </div>
    </div>
    {{-- @include('partials/filter') --}}
        <div id="app">
            <card-blocks />
        </div>
        {{-- <div class="col-12 main-features-section-btn">
            <a class="features-btn js-load-subjects" href="#">Load more</a>
        </div> --}}
</div>
@endsection
