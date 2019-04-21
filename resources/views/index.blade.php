@extends('layouts.master')

@section('content')
    @include('partials.header')
    
    <div class="c-home-container">
        <div class="c-home-features">
            <div class="container">
                <div class="col-12">
                    <div class="c-home-feature">
                        <h1>Practicing for school was never this fun</h1>
                    </div>
                    <div class="col-12 row">
                        <div class="col-3 home-features-icon">
                            <img src="https://image.flaticon.com/icons/svg/1577/1577283.svg" alt="">
                            <h4>wewjoewoijejow</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                        </div>
                        <div class="col-3 home-features-icon">
                            <img src="https://image.flaticon.com/icons/svg/1577/1577283.svg" alt="">
                            <h4>wewjoewoijejow</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                        </div>
                        <div class="col-3 home-features-icon">
                            <img src="https://image.flaticon.com/icons/svg/1577/1577283.svg" alt="">
                            <h4>wewjoewoijejow</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                        </div>
                    </div>
                    <div class="col-12 home-features-button">
                        <a href="#">Learn more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="c-subjects-section">
            <div class="c-subjects-section-block row">
                
                <div class="col-12">
                    <h5>Top subjects</h5>
                </div>

                @foreach($subjects as $subject)
                    <a href="{{ $subject->slug }}" class="col-3 c-subjects row">
                        <div class="subjects-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>{{ $subject->title }}</h4>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="newsletter">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="col-6 newsletter-section">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <h1>Subscribe for our newsletter</h1>
                {!! Form::open() !!}
                <div class="form-group">
                    {!! Form::email("email", null, ["class" => "form-control", "placeholder" => "Your e-mail"]) !!}
                </div>

                <button class="btn">Sign up free</button>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
