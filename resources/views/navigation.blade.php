<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                        <img src="{{ asset('assets/logo.png') }}" alt="" class="w-20">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('user.regist')" :active="request()->routeIs('user.regist')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('user.regist')" :active="request()->routeIs('user.regist')">
                        {{ __('Service') }}
                    </x-nav-link>
                    <x-nav-link :href="route('user.regist')" :active="request()->routeIs('user.regist')">
                        {{ __('Contact') }}
                    </x-nav-link>
                </div>
            </div>