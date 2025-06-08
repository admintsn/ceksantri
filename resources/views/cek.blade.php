<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BZJHVHE7EZ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-BZJHVHE7EZ');
    </script>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#274043">

    <title>@yield('title', 'Cek Santri')</title>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <!-- Scripts -->
    @filamentStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
</head>

<body class="font-raleway antialiased bg-tsn-bg no-scrollbar h-screen">
    {{-- header --}}
    <div class="flex sticky top-0 h-24 z-50 bg-tsn-header border-b-4 border-tsn-accent justify-center">
        <div class="w-fit mt-4 me-4">
            {{-- <figure><img src="\LogoTSN.png" alt="Album" class="w-16" /></figure> --}}
        </div>
        <div class="w-fit mt-4 me-4">
            <a href="https://tsn.ponpes.id/">
                <figure><img src="\LogoTSN.png" alt="Album" class="w-16" /></figure>
            </a>
        </div>
        <div class="w-fit mt-4 me-4">
            {{-- <figure><img src="\LogoTSN.png" alt="Album" class="w-16" /></figure> --}}
        </div>
    </div>

    @livewire('cek-santri')

    @filamentScripts
    @vite('resources/js/app.js')

</body>

</html>