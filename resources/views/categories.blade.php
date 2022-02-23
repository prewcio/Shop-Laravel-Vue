<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes/head')
        <link href="{{ asset('css/category.css') }}" media="all" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="app">
            <div class="container">
                <navi></navi>
                <items></items>
            </div>
        </div>

        <script src="{{  asset('js/app.js') }}"></script>
    </body>
</html>
