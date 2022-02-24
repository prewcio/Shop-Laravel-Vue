<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes/navi')
        <link href="{{ asset('css/items.css') }}" media="all" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="app">
            <div class="container">
                <navi></navi>
                <items></items>
                <webfoot></webfoot>
            </div>
        </div>
        @include('includes/footer')
    </body>
</html>
