@extends('layouts.app')

@section('title', 'Log in')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/flex.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/illustration_bar.css') }}" type="text/css">
@stop

@section('content')
    <div class="container">
        <div class="flex-item illustration-poster left">
            <a href="{{ route('register') }}">&laquo; Go to Signup</a>
            <h1>Login</h1>
            <img src="{{ asset('img/illustration/illus_login.svg') }}" alt="Illustration">
        </div>
        <div class="flex-item ml-50">
            <div class="wrapper">
                <div class="brand">
                    <img src="img/brand/brand_martial_search.svg" alt="Martial Search" class="brand__logo">
                    <h1 class="brand__title">Martial Search</h1>
                </div>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" autocomplete="off">
                    </div>
            
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">
                    </div>
                    
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
@stop