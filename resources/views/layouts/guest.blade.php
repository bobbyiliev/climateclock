<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <style>[x-cloak]{ display:none }</style>

        @livewireStyles

    </head>
    <body>
        <div class="relative flex overflow-hidden">
            <div class="container relative z-50 flex-shrink-0 w-full font-sans antialiased text-gray-900 md:max-w-xl">
                {{ $slot }}
            </div>
            <img src="/images/climate-clock.jpg" class="relative z-10 object-cover w-full h-screen">

            <div class="absolute inset-0 z-20 w-full h-full opacity-25 bg-gradient-to-l from-black to-transparent"></div>
        </div>

        @livewireScripts
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js"></script>
    </body>
</html>
