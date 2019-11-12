@extends('layouts.app')

@section('title', 'Register')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/useredit.css') }}" type="text/css">
@stop

@section('content')
    <div class="container">
            <div class="wrapper">
                <div class="brand">
                    <img src="{{ asset('img/brand/brand_martial_search.svg') }}" alt="Martial Search" class="brand__logo">
                    <h1 class="brand__title">Martial Search</h1>
                </div>
                {{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT', 'autocomplete' => 'off', 'files' => true]) }}    
                    @include('partials.userform')
                    {{ Form::button('Update Profile', ['type' => 'submit'] ) }}
                {{ Form::close() }}
            </div>
    </div>
@stop