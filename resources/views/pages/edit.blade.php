@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/dojo.css') }}" type="text/css">
@stop

@section('content')
    <div class="brand">
        <img src="{{ asset('img/brand/brand_martial_reverse.svg') }}" alt="Martial Search" class="brand__logo">
        <h1 class="brand__title">Martial Search</h1>
    </div>
    {{-- <form action="{{ route('ownerships.update', $ownership->id_kepemilikan) }}" method="POST" autocomplete="off" enctype="multipart/form-data"> --}}
    {{ Form::model($ownership, ['route' => ['ownerships.update', $ownership->id_kepemilikan], 'method' => 'PUT', 'autocomplete' => 'off', 'files' => true]) }}
        @include('partials.form')
    {{ Form::close() }}
@stop