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
        
        <style>
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-20px); }
            }
            .float-animation {
                animation: float 6s ease-in-out infinite;
            }
            @keyframes gradient {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }
            .animated-gradient {
                background-size: 200% 200%;
                animation: gradient 15s ease infinite;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-100 via-purple-50 to-pink-100 animated-gradient relative overflow-hidden">
            <!-- Decorative Elements -->
            <div class="absolute top-0 left-0 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse"></div>
            <div class="absolute top-0 right-0 w-72 h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse animation-delay-4000"></div>
            
            <div class="relative z-10 w-full max-w-md px-6 py-8">
                <!-- Logo Section -->
                <div class="text-center mb-8 float-animation">
                    <a href="/" class="inline-block">
                        <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl shadow-lg flex items-center justify-center">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                    </a>
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ config('app.name', 'Live Resume') }}</h1>
                    <p class="text-gray-600">Your professional resume builder</p>
                </div>

                <!-- Card Container -->
                <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-2xl overflow-hidden border border-white/20">
                    <div class="px-8 py-10">
                        {{ $slot }}
                    </div>
                </div>
                
                <!-- Footer -->
                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-600">
                        &copy; {{ date('Y') }} {{ config('app.name', 'Live Resume') }}. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
