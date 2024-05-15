<!doctype html>
<html lang="en">
  <head>
    <<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Order History</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  @vite('resources/js/app.js')

</head>
  <body>
    @extends('layouts.header')

    @include('layouts.sidebar')

    <nav class="flex mb-5 mt-20 ml-[350px]" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
          <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-[#A4907C]">
            Home
          </a>
        </li>
        <li>
          <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-[#A4907C] md:ms-2">Order History</a>
          </div>
        </li>
        <li aria-current="page">
          <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="ms-1 text-sm font-medium text-[#A4907C] md:ms-2 dark:text-gray-400">Detail Order History</span>
          </div>
        </li>
      </ol>
    </nav>

    <div class="ml-[480px] flex">
      <div class="flex mb-10">
          <p class="text-black font-semibold text-3xl">Detail Order History</p>
      </div>
    </div>

    
    <div class="flex ml-[530px] grid grid-cols-2 divide-x-2 divide-[#A4907C]">
      <div class="container pr-2">
        <h2 class="text-base font-normal text-gray-500 text-left text-balance mb-2">Service</h2>
        <p class="text-lg font-semibold text-justify text-black mb-5">Offline Reservation</p>

        <h2 class="text-base font-normal text-gray-500 text-left text-balance mb-2">Address Reservation</h2>
        <p class="text-lg font-semibold text-balance text-black mb-2">Jalan H. Ummayah II, Jl. Sukabirus, Citeureup, Dayeuhkolot, Bandung Regency, West Java 40257, Indonesia</p>
        <h2 class="text-lg font-normal text-gray-500 text-left text-balance mb-5">Notes: Kost 7Days Room</h2>

        <h2 class="text-sm font-normal text-gray-500 text-left text-balance mb-2">On Duty</h2>
        <div class="flex">
          <img src="images\icon-dokter.png" alt="" class="h-[80px] card-image rounded-md">
          <div class="pt-2 pl-3 pr-3">
              <p class="text-base font-semibold text-justify text-black">Drh. Putri Nadia L.</p>
              <h2 class="text-base font-normal text-gray-500 text-left text-balance">Cattle Specialist</h2>
          </div>
        </div>
      </div>

      <div class="container pl-10">
        <div class="flex">
          <div class="flex-container mr-10">
            <h2 class="text-base font-normal text-gray-500 text-left text-balance mb-2">Order ID</h2>
            <p class="text-lg font-semibold text-justify text-black mb-5">Order1234</p>
          </div>

          <div class="flex-container">
            <h2 class="text-base font-normal text-gray-500 text-left text-balance mb-2">Order Date</h2>
            <p class="text-lg font-semibold text-justify text-black mb-5">20 March 2024</p>
          </div>
        </div>
        
        <h2 class="text-base font-normal text-gray-500 text-left text-balance mb-2">Status</h2>
        <p class="text-lg font-semibold text-justify text-yellow-300 mb-5">On Going</p>

        <h2 class="text-lg font-semibold text-black text-left text-balance mb-2">Payment Summary</h2>

        <div class="container">
          <div class="flex">
            <h2 class="text-base font-normal text-gray-500 text-left text-balance mb-2 mr-5">Session Fee (1Hr)</h2>
            <p class="text-base font-semibold text-justify text-black mb-5">Rp 90.000</p>
          </div>
          
          <div class="flex">
            <h2 class="text-base font-normal text-gray-500 text-left text-balance mb-2 mr-5">Service Fee</h2>
            <p class="text-base font-semibold text-justify text-black mb-5">Rp 2.000</p>
          </div>

          <div class="flex">
            <h2 class="text-base font-normal text-gray-500 text-left text-balance mb-2 mr-5">Payment</h2>
            <p class="text-base font-semibold text-justify text-black mb-5">Rp 92.000</p>
          </div>
        </div>

      </div>
    </div>
    
  </body>
</html>