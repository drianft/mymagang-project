<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
        <style>
            .swiper-slide {
            width: 235px !important;
            height:auto;
            }
        </style>
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />
        @php
            $user = Auth::user();
        @endphp

        <div class="flex flex-col min-h-screen {{ (!$user) ? 'min-h-screen bg-white' : ($user->roles == 'admin' ? 'flex min-h-screen bg-gray-100' : 'min-h-screen bg-white') }}">

            @if(!$user || $user && $user->roles == 'applier')
                @include('components.navbar')
            @elseif($user && $user->roles == 'admin')
                @include('components.admin-sidebar')
            @endif

            <!-- Page Content -->
            <main class="flex-1">
                {{ $slot }}
            </main>

            @if(!(auth()->check() && auth()->user()->roles == 'admin') && !request()->routeIs('profile.show'))
                @include('components.footer')
            @endif


        </div>

        @stack('modals')

        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const userMenuButton = document.getElementById("user-menu-button");
                const dropdownMenu = document.querySelector(".absolute.right-0.z-10.mt-2");

                if (dropdownMenu) {
                dropdownMenu.classList.add("hidden");
                }

                let timeoutId;

                if (userMenuButton && dropdownMenu) {
                userMenuButton.addEventListener("mouseenter", function () {
                    clearTimeout(timeoutId);
                    dropdownMenu.classList.remove("hidden");
                });

                userMenuButton.addEventListener("mouseleave", function () {
                    timeoutId = setTimeout(function () {
                    dropdownMenu.classList.add("hidden");
                    }, 200);
                });

                dropdownMenu.addEventListener("mouseenter", function () {
                    clearTimeout(timeoutId);
                    dropdownMenu.classList.remove("hidden");
                });

                dropdownMenu.addEventListener("mouseleave", function () {
                    timeoutId = setTimeout(function () {
                    dropdownMenu.classList.add("hidden");
                    }, 200);
                });
                }

                const mobileMenuButton = document.querySelector("[aria-controls='mobile-menu']");
                const mobileMenu = document.getElementById("mobile-menu");

                if (mobileMenu) {
                    mobileMenu.classList.add("hidden");
                }

                mobileMenuButton.addEventListener("click", function () {
                    if (mobileMenu) {
                    mobileMenu.classList.toggle("hidden");
                    }
                });
                });
                new Swiper('.saved-swiper', {
                slidesPerView: 1.2,
                spaceBetween: 16,
                breakpoints: {
                640: { slidesPerView: 2.2 },
                768: { slidesPerView: 3.5 },
                1024: { slidesPerView: 5 },
                },
            });

            new Swiper('.new-swiper', {
                slidesPerView: 1.5,
                spaceBetween: 12,
                breakpoints: {
                640: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
                1024: { slidesPerView: 5 },
                },
            });
        </script>
    </body>

</html>
