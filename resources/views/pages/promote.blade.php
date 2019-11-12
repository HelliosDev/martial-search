@extends('layouts.app')

@section('title', 'Promote')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/cardview.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/promote.css') }}" type="text/css">
@stop

@section('content')
    <div class="profile">
        <div class="profile__menu">
            <a href="{{ url('/') }}" class="home">Home</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout">Logout</button>
            </form>
        </div>
        <div class="profile__picture">
        <img src="{{ Auth::user()->getProfilePicture() }}" alt="Profile Picture">
        </div>
        <div class="profile__caption">
            <h1>{{ Auth::user()->first_name . " " . Auth::user()->last_name}}</h1>
            <p>{{ Auth::user()->phone_number }}</p>
            <a href="{{ route('users.edit', Auth::id()) }}" class="edit">
                <img src="{{ asset('img/icon/ic_edit.svg') }}" alt="Edit Icon" class="ic__edit">
                <span class="link__edit">Edit Profile</span>
            </a>
        </div>
    </div>
    <div class="wrapper">
        <div class="card__wrapper">
            <div class="card border add" id="add" data-href="{{ route('ownerships.create') }}">
                <img src="{{ asset('img/icon/ic_add.svg') }}" alt="Add Symbol" class="add-symbol">
                <p class="add-new">Add New</p>
            </div>
                @foreach ($ownerships as $ownership)
                    <div class="card border card-list card-detail" id="card" data-href="{{ route('ownerships.edit', $ownership->id_kepemilikan) }}">
                        {{ Form::open(['method' => 'delete', 'route' => ['ownerships.destroy', $ownership->id_kepemilikan]]) }}
                            {{ Form::button('&#x2716;', ['type' => 'submit', 'class' => 'delete-button'] ) }}
                        {{ Form::close() }}    
                        <img src="{{ asset('img/upload/dojo/'.$userId.'/'.$ownership->foto_tempat) }}" alt="Profile" class="card__img">
                        <h2 class="card__title">{{ $ownership->nama_tempat }}</h2>
                        <h5 class="card__description">{{ $ownership->location }}</h5>
                        <p class="card__price">Rp {{ $ownership->biaya }}</p>
                    </div>
                @endforeach
        </div>
    </div>
@stop