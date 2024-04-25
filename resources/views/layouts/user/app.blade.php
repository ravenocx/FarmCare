<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.user.head')

<body class="font-poppins">
    @include('layouts.user.header')

    <main>
        @yield('main-content')
    </main>
    @stack('scripts')

    @include('layouts.user.footer')
</body>
</html>