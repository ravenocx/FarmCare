<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.admin.head')

<body class="font-poppins">
    @include('layouts.admin.header')

    <main>
        @yield('main-content')
    </main>
    @stack('scripts')

</body>
</html>