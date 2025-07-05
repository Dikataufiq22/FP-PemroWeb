<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles & Scripts -->
    @stack('styles')
    @vite(['resources/css/styles.css']) 
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/js/navbar.js'])
    

</head>

<body class="font-sans antialiased">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top py-3 shadow-sm ">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/Logo.png') }}" alt="ExploreX" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/catalog" onclick="showCatalogPage()">Catalog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#how-to-rent">How to Rent</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#faq">Contact</a>
                    </li>
                </ul>

                @if (Auth::check())
                    <div>
                        <!-- Primary Navigation Menu -->
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="flex justify-between h-16">
                                <!-- Settings Dropdown -->
                                <div class="hidden sm:flex sm:items-center sm:ms-6">
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                <div>{{ Auth::user()->name }}</div>

                                                <div class="ms-1">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </button>
                                        </x-slot>

                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('profile.edit')">
                                                {{ __('Profile') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('profile.booking-history')">
                                                <i class=""></i>History
                                            </x-dropdown-link>

                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf

                                                <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                </div>

                                <!-- Hamburger -->
                                <div class="-me-2 flex items-center sm:hidden">
                                    <button @click="open = ! open"
                                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 12h16M4 18h16" />
                                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Responsive Navigation Menu -->
                        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                            <div class="pt-2 pb-3 space-y-1">
                                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                    {{ __('Dashboard') }}
                                </x-responsive-nav-link>
                            </div>

                            <!-- Responsive Settings Options -->
                            <div class="pt-4 pb-1 border-t border-gray-200">
                                <div class="px-4">
                                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                                </div>

                                <div class="mt-3 space-y-1">
                                    <x-responsive-nav-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-responsive-nav-link>
                                    <x-responsive-nav-link :href="route('profile.booking-history')">
                                        <i class=""></i>History
                                    </x-responsive-nav-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-responsive-nav-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-responsive-nav-link>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="d-flex gap-2 align-items-center">
                        <a href="/login"><button class="btn btn-outline-success">Sign In</button></a>
                        <a href="/register"><button class="btn btn-success">Sign Up</button></a>
                    </div>
                @endif

            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="mt-24"></main>
        @yield('contents')
    </main>

    <!-- Footer -->
    <footer class="bg-success text-white py-5">
        <div class="container px-4 px-lg-5 spacing-container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="fw-bold mb-3">
                        <img src="{{ asset('assets/W-Logo.png') }}" alt="ExploraX" height="40">
                    </h5>
                    <p class="mb-3">
                        ExploraX adalah layanan penyewaan peralatan luar ruangan yang terpercaya. 
                        Dengan persiapan yang tepat, kami menyediakan semua peralatan yang Anda butuhkan untuk petualangan luar ruangan Anda. Mari kita menjelajahi alam bersama!
                    </p>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-white"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-youtube fa-lg"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="fw-bold mb-3">Useful Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="#about" class="text-white text-decoration-none">About Us</a></li>
                        <li><a href="#catalog" class="text-white text-decoration-none">Catalog</a></li>
                        <li><a href="#how-to-rent" class="text-white text-decoration-none">How to Rent</a></li>
                        <li><a href="#contact" class="text-white text-decoration-none">Contact</a></li>
                        <li><a href="#faq" class="text-white text-decoration-none">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="fw-bold mb-3">Items</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Tents</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Backpacks</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Sleeping Bags</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Cooking Equipment</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Hiking Gear</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 mb-4">
                    <h6 class="fw-bold mb-3">Contact Info</h6>
                    <div class="d-flex align-items-center mb-2">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        <span>Jl. Congcat No. 123, Yogyakarta</span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class="fas fa-phone me-2"></i>
                        <span>+62 895-6223-57048</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-envelope me-2"></i>
                        <span>info@explorax.com</span>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p class="mb-0">&copy; 2024 ExploraX. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
@stack('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>
