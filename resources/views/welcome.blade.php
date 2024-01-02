<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Travel Advisor API</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="">
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif

            <div class="">
                <div class="flex justify-center">
                    <!-- full screen -->
<dotlottie-player src="https://lottie.host/9a0e216d-11bd-4c29-b3c1-341cea9fc8e5/UhSK6MdNI4.json" background="transparent" speed="1" style="width: 100vh; height: 100vh;" loop autoplay></dotlottie-player>
                </div>
            </div>
        </div>
    </body>
</html>
