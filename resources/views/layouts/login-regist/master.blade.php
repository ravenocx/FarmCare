<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    @vite('resources/js/app.js')
    
</head>
<body>
    <main class="flex font-poppins">
        <div class="w-1/2 h-screen bg-secondaryColor">
            <h1 class="text-primaryColor font-bold text-7xl text-center pt-36 leading-snug">Welcome to <br> FarmCare+</h1>
            <img src="{{asset('images/animal/cow-loginpage.svg')}}" alt="cow-image" class="mx-auto mt-56">
        </div>
        <div class="w-1/2">
            @yield('main-content')
        </div>
    </main>
    @stack('scripts')
</body>
</html>