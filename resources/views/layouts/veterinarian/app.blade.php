<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.veterinarian.head')

<body class="font-poppins">
    @include('layouts.veterinarian.header')

    @include('layouts.veterinarian.sidebar')
    <main class="ml-[340px] pt-[146px] pr-10 pb-10">
        @yield('main-content')
    </main>
    @stack('scripts')

</body>
</html>