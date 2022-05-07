<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="robots" content="noindex, nofollow">

        <title>@yield('title')SIGI &amp; Co</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
<link rel="icon" href="https://sigiandco.com/wp-content/uploads/2021/08/cropped-sigi_logo-8-32x32.png" sizes="32x32" /><link rel="icon" href="https://sigiandco.com/wp-content/uploads/2021/08/cropped-sigi_logo-8-192x192.png" sizes="192x192" /><link rel="apple-touch-icon" href="https://sigiandco.com/wp-content/uploads/2021/08/cropped-sigi_logo-8-180x180.png" />
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="css/frontend_custom.css">


        <link rel="stylesheet" href="css/engine.css">
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <style>
            body{
                overflow-y: auto;
            }
        </style>

    </head>
    <body class="scroll-custom">

        <!-- @yield('video') -->
        <div class="running-in--background">
            <video loop="loop" autoplay playsinline muted> <source type="video/mp4" src="https://sigiandco.com/wp-content/uploads/2021/06/frontpage_video.mp4"></video>
        </div>
        <div class="font-sans text-gray-900 antialiased guest-layout">
            {{ $slot }}
        </div>
    </body>
</html>
