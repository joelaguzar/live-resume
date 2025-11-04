<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Live Resume') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-custom-bg font-sans antialiased">
        
        <!-- Navigation -->
        @if (Route::has('login'))
            <nav class="bg-white border-b border-custom-line">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center h-16">
                        <!-- Logo/Brand -->
                        <div class="flex items-center">
                            <a href="{{ url('/') }}" class="text-2xl font-bold text-custom-accent">
                                {{ config('app.name', 'Live Resume') }}
                            </a>
                        </div>
                        
                        <!-- Auth Buttons -->
                        <div class="flex items-center gap-3">
                            @auth
                                <a
                                    href="{{ url('/dashboard') }}"
                                    class="inline-flex items-center px-4 py-2 bg-white border border-custom-line rounded-md font-medium text-sm text-custom-text hover:bg-gray-50 transition-colors duration-200"
                                >
                                    Dashboard
                                </a>
                            @else
                                <a
                                    href="{{ route('login') }}"
                                    class="inline-flex items-center px-4 py-2 bg-white border border-custom-line rounded-md font-medium text-sm text-custom-text hover:bg-gray-50 transition-colors duration-200"
                                >
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a
                                        href="{{ route('register') }}"
                                        class="inline-flex items-center px-4 py-2 bg-custom-accent border border-transparent rounded-md font-medium text-sm text-white hover:bg-blue-800 transition-colors duration-200"
                                    >
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>
        @endif
        
        <!-- Main Hero Section -->
        <!-- Main Hero Section -->
        <main class="flex-1 flex items-center justify-center w-full px-4 sm:px-6 lg:px-8 py-16">
            <div class="max-w-7xl mx-auto text-center">
                <!-- Hero Content -->
                <div class="mb-12">
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-custom-accent mb-6">
                        Build Your Professional Resume
                    </h1>
                    <p class="text-xl md:text-2xl text-custom-muted mb-8 max-w-3xl mx-auto">
                        Create stunning, professional resumes that stand out. Showcase your skills, projects, and achievements with our elegant resume builder.
                    </p>
                    
                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                        @auth
                            <a
                                href="{{ url('/dashboard') }}"
                                class="inline-flex items-center px-8 py-4 bg-custom-accent border border-transparent rounded-lg font-semibold text-base text-white hover:bg-blue-800 transition-colors duration-200 shadow-lg hover:shadow-xl"
                            >
                                Go to Dashboard
                                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        @else
                            <a
                                href="{{ route('register') }}"
                                class="inline-flex items-center px-8 py-4 bg-custom-accent border border-transparent rounded-lg font-semibold text-base text-white hover:bg-blue-800 transition-colors duration-200 shadow-lg hover:shadow-xl"
                            >
                                Get Started Free
                                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                            <a
                                href="{{ route('login') }}"
                                class="inline-flex items-center px-8 py-4 bg-white border-2 border-custom-line rounded-lg font-semibold text-base text-custom-accent hover:border-custom-accent transition-colors duration-200"
                            >
                                Sign In
                            </a>
                        @endauth
                    </div>
                </div>

                <!-- Features Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-20">
                    <!-- Feature 1 -->
                    <div class="bg-white rounded-lg p-8 border border-custom-line shadow-md hover:shadow-lg transition-shadow duration-200">
                        <div class="w-16 h-16 bg-custom-chip-bg rounded-lg flex items-center justify-center mb-4 mx-auto">
                            <svg class="w-8 h-8 text-custom-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-custom-accent mb-3">Easy to Use</h3>
                        <p class="text-custom-muted">
                            Simple and intuitive interface to create your professional resume in minutes.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="bg-white rounded-lg p-8 border border-custom-line shadow-md hover:shadow-lg transition-shadow duration-200">
                        <div class="w-16 h-16 bg-custom-chip-bg rounded-lg flex items-center justify-center mb-4 mx-auto">
                            <svg class="w-8 h-8 text-custom-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-custom-accent mb-3">Professional Design</h3>
                        <p class="text-custom-muted">
                            Clean, modern layouts that make your resume stand out to employers.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="bg-white rounded-lg p-8 border border-custom-line shadow-md hover:shadow-lg transition-shadow duration-200">
                        <div class="w-16 h-16 bg-custom-chip-bg rounded-lg flex items-center justify-center mb-4 mx-auto">
                            <svg class="w-8 h-8 text-custom-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-custom-accent mb-3">Export as PDF</h3>
                        <p class="text-custom-muted">
                            Download your resume as a PDF with a single click, ready to send to employers.
                        </p>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="w-full py-6 mt-20 border-t border-custom-line">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <p class="text-custom-muted text-sm">
                    &copy; {{ date('Y') }} {{ config('app.name', 'Live Resume') }}. All rights reserved.
                </p>
            </div>
        </footer>

    </body>
</html>