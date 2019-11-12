@extends('layouts.app')

@section('title', 'Home')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/cardview.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" type="text/css">
@stop

@section('content')
    <div class="linear-banner">
        <div class="wrapper">
            <header>
                <nav>
                    <div class="brand">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('img/brand/brand_martial_reverse.svg') }}" alt="Martial Search" class="brand__logo">
                            <span class="brand__title">Martial Search</span>
                        </a>
                    </div> 
                    <div class="pages">
                        <a href="{{ url('search') }}">Search</a>
                        <a href="{{ url('promote') }}">Promote</a>
                        @if (!Auth::id())
                            <a class="btn-link" href="{{ url('login') }}">Join Us</a>
                        @else
                        {{-- {{ Auth::user()->getProfilePicture() }} --}}
                    <img src="{{ asset('img/upload/profile/default.svg') }}" alt="Avatar" class="avatar">
                        @endif  
                    </div>
                    <div class="toggle-btn">
                        <span>&#9776;</span>
                    </div>
                </nav>
                <div class="content">
                    <div class="content_left">
                        <h1>Search For The Nearest Dojo Now</h1>
                        <p>We are able to help you in searching for the nearest Dojo and you have the ability to publish your own Dojo.</p>
                        @if (!Auth::id())
                            <a href="{{ url('register') }}" class="btn-link">Register Now</a>
                        @endif
                    </div>
                    <div class="content_right">
                    <img src="{{ asset('img/illustration/illus_marketting.svg') }}" alt="Marketting">
                    </div>
                </div>
            </header>
            <section class="work">
                <h1>How it works</h1>
                <div class="card__wrapper">
                    <div class="card">
                        <img src="{{ asset('img/illustration/illus_map.svg') }}" alt="work illustration" class="card__img">
                        <h3 class="card__title">Locate Dojo</h3>
                        <p class="card__description">Search and look for the dojo which is suitable for you</p>
                    </div>
                    <div class="card">
                        <img src="{{ asset('img/illustration/illus_contact.svg') }}" alt="work illustration" class="card__img">
                        <h3 class="card__title">Contact Owner</h3>
                        <p class="card__description">Contact the owner of the dojo which you have found suitable</p>
                    </div>
                    <div class="card">
                        <img src="{{ asset('img/illustration/illus_agreement.svg') }}" alt="work illustration" class="card__img">
                        <h3 class="card__title">Reach Agreement</h3>
                        <p class="card__description">Reach the agreement and you’re ready to train</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="wrapper">
        <section class="gps">
            <div class="content">
                <div class="content_left">
                <img src="{{ asset('img/illustration/illus_gps.svg') }}" alt="GPS Illustration" class="illustration-gps">
                </div>
                <div class="content_right">
                    <h1>Location Finding</h1>
                    <p>You can search for the location and the other details of the dojo via our service.</p>
                </div>
            </div>
        </section>
    </div>
    <footer>
        <p>&copy; 2019 All Rights Reserved</p>
    </footer>
@stop