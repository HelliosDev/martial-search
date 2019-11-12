@extends('layouts.app')

@section('title', "Detail")

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}" type="text/css">
@stop

@section('content')
    <div class="dojo__banner">
        <div class="banner__image">
            <img src="{{ asset('img/upload/dojo/'.$ownership->id_user.'/'.$ownership->foto_tempat) }}" alt="Dojo" class="dojo__image">
        </div>
        <div class="wrapper">
            <div class="dojo__title">
                <h1 class="dojo__name">{{ $ownership->nama_tempat }}</h1>
                <h3 class="dojo__city">{{ $ownership->location }}</h3>
            </div>
        </div>
    </div>
    <div class="wrapper">
        <h3 class="dojo__price">Rp. {{ $ownership->biaya }}</h3>
        <div class="content__description">
            <div class="dojo__description">
                <div class="schedule">
                    <h5 class="description__heading">Schedule</h5>
                    <p class="schedule__date">{{ $ownership->hari_latihan }}</p>
                    <div class="schedule__range">
                        <p>
                            <span class="schedule__time">{{ $ownership->jadwal_mulai }}</span> sampai dengan <span class="schedule__time">{{ $ownership->jadwal_berakhir }}</span>
                        </p>
                    </div>
                </div>
                <div class="martial-arts">
                    <h5 class="description__heading">Jenis Beladiri</h5>
                    <p>{{ $ownership->beladiri }}</p>
                </div>
            </div>
            <div class="dojo__contact">
                <h5 class="contact__heading">Contact Me</h5>
                <p class="owner__name">{{ $ownership->first_name . " " . $ownership->last_name }}</p>
                <div class="owner__contact">
                    <img src="{{ asset('img/icon/ic_call.svg') }}" alt="Call Icon" class="call__icon">
                    <p class="owner__number">{{ $ownership->phone_number }}</p>
                </div>
            </div>
        </div>
    </div>
@stop