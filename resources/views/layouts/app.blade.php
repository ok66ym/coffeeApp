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
        
        <!--FontAwesome-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
        
        <!--CSS-->
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-orange-100">
        <div class="flex flex-col bg-orange-100">
            
            <!--Header-->
            <div class="bg-yellow-700 fixed top-0 inset-x-0 z-50 shadow-lg">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                     <!-- Placeholder for spacing -->
                    <div class="flex items-center">
                    </div>
                    
                    <!-- Logo -->
                    <div class="flex-shrink-0">
                        <a href="{{ route('index') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                        </a>
                    </div>
                    
                    <!-- Settings Dropdown -->
                    <div class="flex items-center">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-7 py-2 border border-transparent text-sm leading-4 font-medium rounded-md font-bold text-white bg-yellow-700 hover:bg-yellow-800 focus:outline-none transition ease-in-out duration-150">
                                    <div>マイページ</div>
        
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
        
                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
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
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white bg-yellow-700 hover:bg-yellow-800 focus:outline-none focus:bg-gray-100 focus:text-black transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
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

            <!-- Page Content -->
            <main class="flex-grow">
                {{ $slot }}
            </main>
            
            <!--footer-->
                <div class="bg-yellow-700 fixed bottom-0 inset-x-0 z-10">
            <!-- Navigation Links - for larger screens -->
                    <!-- Navigation Links - for larger screens -->
                    <div class="flex py-2 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <!-- Using flex-1 to divide the space equally and justify-center and items-center to center the content. -->
                        <div class="flex flex-1 justify-center items-center whitespace-nowrap border-r border-white">
                            <img src="{{ asset('img/home_logo.png') }}" alt="ホーム" class="h-20 w-20">
                            <x-nav-link class="text-2xl text-white font-bold no-underline" :href="route('index')" :active="request()->routeIs('index')">
                                {{ __('ホーム') }}
                            </x-nav-link>
                        </div>
                        <div class="flex flex-1 justify-center items-center whitespace-nowrap border-r border-white">
                            <img src="{{ asset('img/post_logo.png') }}" alt="投稿" class="h-20 w-20">
                            <x-nav-link class="text-2xl text-white font-bold no-underline" :href="route('create')" :active="request()->routeIs('create')">
                                {{ __('投稿') }}
                            </x-nav-link>
                        </div>
                        <div class="flex flex-1 justify-center items-center whitespace-nowrap border-r border-white">
                            <img src="{{ asset('img/coffee_logo.png') }}" alt="検索" class="h-20 w-20">
                            <x-nav-link class="text-2xl text-white font-bold no-underline" :href="route('searches.index')" :active="request()->routeIs('searches.index')">
                                {{ __('検索') }}
                            </x-nav-link>
                        </div>
                        <div class="flex flex-1 justify-center items-center whitespace-nowrap border-r border-white">
                            <img src="{{ asset('img/search_logo.png') }}" alt="検索履歴" class="h-20 w-20">
                            <x-nav-link class="text-2xl text-white font-bold no-underline" :href="route('searchestores.index')" :active="request()->routeIs('searchestores.index')">
                                {{ __('検索履歴') }}
                            </x-nav-link>
                        </div>
                        <div class="flex flex-1 justify-center items-center whitespace-nowrap">
                            <img src="{{ asset('img/hint_logo.png') }}" alt="アプリについて" class="h-20 w-20">
                            <x-nav-link class="text-2xl text-white font-bold no-underline" :href="route('about.instruction')" :active="request()->routeIs('about.instruction')">
                                {{ __('アプリについて') }}
                            </x-nav-link>
                        </div>
                    </div>
                </div>
        </div>
    </body>
</html>
