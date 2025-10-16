<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-partials.head />
</head>

<body>

    <x-partials.preloader />

    <x-partials.header />

    {{ $slot }}

    <x-partials.footer />

    <x-partials.mobile-components />

    <x-partials.scripts />
</body>

</html>
