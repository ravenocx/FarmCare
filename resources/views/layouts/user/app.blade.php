<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.user.head')

<body class="font-poppins">
    @include('layouts.user.header')

    @if(Auth::guard('user')->check())
        @include('layouts.user.breadcrumbs')
    @else
        <div class="mb-24"></div>
    @endif

    <main>
        @yield('main-content')
    </main>
    @stack('scripts')

    @include('layouts.user.footer')
</body>
</html>