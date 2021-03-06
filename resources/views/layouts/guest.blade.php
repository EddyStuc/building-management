<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Building-Management') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body class="antialiased">
        <div class="font-sans text-gray-900 antialiased">
            <div class="relative flex flex-col bg-white overflow-hidden h-screen">
                @if (! request()->routeIs('welcome'))
                <div class="md:w-1/2 flex justify-end mt-6 pr-4">
                    <x-a-link-button :href="route('welcome')">
                        Home
                    </x-a-link-button>
                </div>
                @endif
                <div class="md:left-0 md:w-1/2 bg-white h-full flex items-center">
                    <div class="w-full px-4 md:px-14">
                        {{ $slot }}
                    </div>
                </div>
                <div class="hidden md:flex absolute inset-y-0 right-0 w-1/2">
                    <img class="h-full w-full object-cover" src="/images/building2.jpg" alt="">
                </div>
            </div>
        </div>
        <x-flash />
    </body>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</html>
