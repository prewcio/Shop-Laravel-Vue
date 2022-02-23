<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes/head')
        <link href="{{ asset('css/auth.css') }}" media="all" rel="stylesheet" type="text/css"/>
    </head>
<body>
<div id="app">
    <div class="container">
        <navi></navi>
        <login></login>
        <webfoot></webfoot>
    </div>
</div>
@include('includes/footer')
</body>

