<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.user.head')

<body class="font-poppins">
    @include('layouts.user.header')

    @if(Route::currentRouteName() == 'landing-page' || Route::currentRouteName()=='user.home' || Route::currentRouteName()=='faq')
        <div class="mb-24"></div>
    @else
        @include('layouts.user.breadcrumbs')
    @endif

    <main>
        @yield('main-content')
    </main>
    @stack('scripts')

    @include('layouts.user.footer')
</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.user.head')

<body class="font-poppins">
    @include('layouts.user.header')

    @if(Route::currentRouteName() == 'landing-page' || Route::currentRouteName()=='user.home')
        <div class="mb-24"></div>
    @else
        @include('layouts.user.breadcrumbs')
    @endif

    <main>
        @yield('main-content')
    </main>
    @stack('scripts')

    @include('layouts.user.footer')
</body>
</html>