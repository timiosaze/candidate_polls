<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Scripts -->
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">
        <script>
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>
        @livewireStyles
        @livewireScripts
        @wireUiScripts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <x-notifications />
        @include('sweetalert::alert')
        <div class="flex flex-col min-h-screen">
            @include('partials.header')
            <div class="font-sans text-gray-900 antialiased dark:bg-gray-900">
                {{ $slot }}
            </div>
            @include('partials.footer')
        </div>

        <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
        <script src="{{asset('js/script.js')}}"></script>
    </body>
</html>
