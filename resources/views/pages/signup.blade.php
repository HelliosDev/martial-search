@extends('layouts.app')

@section('title', 'Register')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/flex.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/illustration_bar.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}" type="text/css">
@stop

@section('content')
    <div class="container">
            
        <div class="flex-item mr-50">
            <div class="wrapper">
                <div class="brand">
                    <img src="{{ asset('img/brand/brand_martial_search.svg') }}" alt="Martial Search" class="brand__logo">
                    <h1 class="brand__title">Martial Search</h1>
                </div>
                {{ Form::open(['method' => 'POST', 'autocomplete' => 'off', 'files' => true, 'route' => 'register']) }}    
                    @include('partials.userform')
                    {{ Form::button('Register Now', ['type' => 'submit'] ) }}
                {{ Form::close() }}
            </div>
        </div>
        <div class="flex-item illustration-poster right">
            <a href="{{ route('login') }}" class="fl_right">&raquo; Go to Login</a>
            <h1>Sign Up</h1>
            <img src="img/illustration/illus_signup.svg" alt="Illustration">
        </div>
    </div>
@stop