<!DOCTYPE html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @isset($title)
            {{ $title }}
        @else
            {{ config('app.name') }}
        @endisset
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="d-flex flex-column h-100">

    @if(!@isset($removeheader))
        @include('components.app-layout.header')
    @endif

    {{ $slot }}

    @if(!@isset($removefooter))
        @include('components.app-layout.footer')
    @endif

</body>
</html>
