<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta  name='viewport'content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')SIGI &amp; Co</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
         <link rel="icon" href="https://sigiandco.com/wp-content/uploads/2021/08/cropped-sigi_logo-8-32x32.png" sizes="32x32" /><link rel="icon" href="https://sigiandco.com/wp-content/uploads/2021/08/cropped-sigi_logo-8-192x192.png" sizes="192x192" /><link rel="apple-touch-icon" href="https://sigiandco.com/wp-content/uploads/2021/08/cropped-sigi_logo-8-180x180.png" />
        <link rel="stylesheet" href="css/frontend_custom.css">
              
        <link rel="stylesheet" href="{{ asset('css/engine.css') }}">
        <link rel="stylesheet" href="../../css/engine.css">  
        

        @livewireStyles

        @yield('style')
        <style>
            body{
                max-height:100% !important;
                margin:0 !important;
                padding:0 !important;
                top: 0 !important;
                bottom: 0 !important;
            }
        </style>
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        
        <style>
            .body{
             margin: 0;
             width: 100%;
                height: 100%;
               width: fit-content;
                block-size: fit-content  ;  
                overflow-y: scroll;
                }
                .content{
                    text-align: center;
           
            position: absolute;
            top: 50%;
            left: 1%;
            right: 1%;
                }
                @media screen and (max-width: 900px) {
            body { zoom: 0.9; }
        }
        @media screen and (max-width: 800px) {
            body { zoom: 0.8; }
        }
        @media screen and (max-width: 800px) {
            body { zoom: 0.8; }
        }
        @media screen and (max-width: 700px) {
            body { zoom: 0.7; }
        }
        </style>
    </head>
    <body class="font-sans antialiased bg-gray-900 body" id="" >
        <x-jet-banner />

        <main class="flex absolute w-full h-full flex-auto">
            <div class="min-h-full bg-gray-900 flex overflow-hidden flex-col w-full h-full">
            
            @if(!Request::is('trade') && !Request::is('wallet') && !Request::is('orders'))
                @livewire('navigation-menu')
            @endif
            
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-gray-800 shadow header">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            
                {{ $slot }}
            
            </div>
        </main>

        @stack('modals')

        @livewireScripts

        @if(Request::is('trade'))
        <script>
            setTimeout(function(){
                $('body').on('click', '.hamburger_menu', function(){
                    var findsub = $(document).find('.submenu');

                    if(findsub.length > 0){
                        $('.symbol-search-select').click();
                    }
                });
            }, 500);
        </script>
        @endif
    </body>
</html>
