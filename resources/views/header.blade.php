<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="./output.css" rel="stylesheet">

        <!-- Styles -->
        
        <header class="bg-white flex items-center justify-between p-4">
            <div class="flex items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Farmcare Logo" class="w-10 h-10 mr-4">
            <h1 class="text-2xl font-bold">Farmcare</h1>
            </div>
        <div class="flex items-center">
            <a href="#">
            <img src="{{ asset('img/profile.png') }}" alt="User Profile" class="w-8 h-8 rounded-full mr-4">
            </a>
          
         </div>
        </header>
    </head>
    </html>