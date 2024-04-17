<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Footer</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <!-- Styles -->

        <style>


.navbar {
            background-color: #fff;
            padding: 14px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            text-decoration: none;
            color: black;
            padding: 8px 16px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-menu a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: black;
        }

        .dropdown-menu a:hover {
            background-color: #f2f2f2;
        }

        /* Tambahkan warna saat menu dihover */
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
        
        <header class="bg-white flex items-center justify-between p-4">
    <div class="flex items-center">
        <img src="{{ asset('images/logo.png') }}" alt="Farmcare Logo" class="w-24 h-auto mr-4">
        <nav class="flex items-center space-x-4">
            <a href="#" class="text-black hover:text-gray-700">Home</a>
            <div class="dropdown">
                <button class="text-black hover:text-gray-700">Service</button>
                <div class="dropdown-menu">
                    <a href="#" class="text-black hover:text-gray-700">Online Consultation</a>
                    <a href="#" class="text-black hover:text-gray-700">Offline Reservation</a>
                    <a href="#" class="text-black hover:text-gray-700">Article</a>
                </div>
            </div>
            <a href="#" class="text-black hover:text-gray-700">Contact Us</a>
        </nav>
    </div>

    <div class="flex items-center">
        @auth <!-- Mengecek apakah ada pengguna yang sudah login -->
            <div class="flex items-center">
                <span class="text-black">{{ Auth::user()->name }}</span>
                <a href="#">
                    <img src="{{ asset('img/profile.png') }}" alt="User Profile" class="w-8 h-8 rounded-full ml-4">
                </a>
            </div>
        @endauth
    </div>
</header>






    </head>
    </html>