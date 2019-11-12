@extends('layouts.app')

@section('title', 'Search')

@section('styles')
    <link rel="stylesheet" href="css/cardview.css" type="text/css">
    <link rel="stylesheet" href="css/search.css" type="text/css">
@stop

@section('content')
    <div class="banner">
        <img src="img/brand/brand_martial_reverse.svg" alt="Martial Search">
        <h1>Search for The Dojo Near You Now !</h1>
    </div>
    <div class="search__container">
        <form action="{{ route('ownerships.search') }}" method="GET">
            <input type="text" name="keyword" pla4ceholder="Enter some keywords" id="search" class="search-box">
        </form>
    </div>
    <div class="card__wrapper">
        @if (count($ownerships) > 0)
            @foreach ($ownerships as $ownership)
                <div class="card border card-detail" data-href="{{ route('detail', $ownership->id_kepemilikan) }}">
                    <img src="{{ asset('img/upload/dojo/'.$ownership->id_user.'/'.$ownership->foto_tempat) }}" alt="Dojo Image" class="card__img">
                    <h2 class="card__title">{{ $ownership->nama_tempat }}</h2>
                    <h5>{{ $ownership->location }}</h5>
                    <p class="card__price">{{ $ownership->biaya }}</p>
                </div>
            @endforeach
        @else
            <strong style="font-size: 30px;">No result is found</strong>
        @endif
    </div>
@stop