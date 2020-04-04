<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.18.1"></script>
</head>
<body class="bg-blue-200 h-screen antialiased leading-none">
    <div id="app" class="flex justify-center py-16 ">
        <weather-app></weather-app>

    </div>
<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
