<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ config('app.name') . " | "}}@yield('title', "")</title>
        <link rel="icon" href="{{ asset('img/icon/ic_martial_search.png') }}" type="image/png" sizes="16x16">
        <link rel="stylesheet" href="{{ asset('css/reset.css') }}" type="text/css">
        @yield('styles')
        <link rel="stylesheet" href="{{ asset('../node_modules/dropzone/dist/dropzone.css') }}" type="text/css">
    </head>
    <body>

        @yield('content')
        <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('../node_modules/dropzone/dist/dropzone.js') }}"></script>
        <script type="text/javascript" src="{{ asset('../node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/preview.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/cardclick.js') }}"></script>
        @include('sweet::alert')
    </body>
</html>