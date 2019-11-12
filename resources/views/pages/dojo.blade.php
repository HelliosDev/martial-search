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
    {{ Form::open(['method' => 'POST', 'autocomplete' => 'off', 'files' => true, 'route' => 'ownerships.store']) }}
        @include('partials.form')
    {{ Form::close() }}
@stop