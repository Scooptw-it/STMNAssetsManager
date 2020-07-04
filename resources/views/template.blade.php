<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>STMN Assets Manager</title>

        <!-- Fonts -->
        <!-- asset will allow us to create a url public folder -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

        <!-- Styles -->  
        <style>
        </style>
    </head>
    <body>

        @include('_includes/nav/topnav')

        @yield('content')

    </body>
</html>
