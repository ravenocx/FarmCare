<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.veterinarian.head')

<body class="font-poppins">
    @include('layouts.veterinarian.header')

    @include('layouts.veterinarian.sidebar')
    <main class="ml-[290px] pt-[110px] pr-1 pb-10">
        @yield('main-content')
        
    </main>

    @include('layouts.veterinarian.footer')
    @stack('scripts')
    
</body>
</html>