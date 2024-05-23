@extends('layouts.veterinarian.app')

@section('title', 'Veterinarian - Detail Order History')

@section('main-content')
    <a class="flex items-center space-x-2 mb-4" href="{{ route('veterinarian.orderhistory') }}">
        <img src="{{ asset('images/vector/back-vector.svg') }}">
        <p class="text-base text-primaryColor">Back</p>
    </a>

    <div class="flex mb-10">
        <p class="text-black font-semibold text-3xl">Detail Order History</p>
    </div>
    
    <div class="flex grid grid-cols-2 divide-x-2 divide-[#A4907C]">
      <div class="container pr-2">
        <h2 class="text-base font-normal text-gray-500 text-left text-balance mb-2">Service</h2>
        <p class="text-lg font-semibold text-justify text-black mb-5">{{$order->service_category}}</p>

        <h2 class="text-base font-normal text-gray-500 text-left text-balance mb-2">Address Reservation</h2>
        <p class="text-lg font-semibold text-balance text-black mb-2">Jalan H. Ummayah II, Jl. Sukabirus, Citeureup, Dayeuhkolot, Bandung Regency, West Java 40257, Indonesia</p>
        <h2 class="text-lg font-normal text-gray-500 text-left text-balance mb-5">Notes: Kost 7Days Room</h2>

        <h2 class="text-sm font-normal text-gray-500 text-left text-balance mb-2">On Duty</h2>
        <div class="flex">
          <img src="{{Auth::guard('veterinarian')->user()->photo ? : asset('images/assets/vet-schedule-image.svg')}}" class="rounded-md border border-shadeBrown h-[80px] w-[80px] mr-3">
          <div class="pt-2 pr-3">
              <p class="font-bold text-base">{{(Auth::guard('veterinarian')->user()->gender == 'male' ? 'Dr.' :'Dra.') . Auth::guard('veterinarian')->user()->name}}</p>
              <p class="text-base text-gray-500">{{Auth::guard('veterinarian')->user()->specialist}} Specialist</p>
          </div>
        </div>
      </div>

      <div class="container pl-10">
        <div class="flex">
          <div class="flex-container mr-10">
            <h2 class="text-base font-normal text-gray-500 text-left text-balance mb-2">Order ID</h2>
            <p class="text-lg font-semibold text-justify text-black mb-5">{{$order->id}}</p>
          </div>

          <div class="flex-container">
            <h2 class="text-base font-normal text-gray-500 text-left text-balance mb-2">Order Date</h2>
            <p class="text-lg font-semibold text-justify text-black mb-5">{{$order->order_date->format('d F Y')}}</p>
          </div>
        </div>
        
        <h2 class="text-base font-normal text-gray-500 text-left text-balance mb-2">Status</h2>
        @php
            $statusClass = '';
            switch ($order->order_status) {
                case 'Complete':
                    $statusClass = 'text-[#6AB96C]';
                    break;
                case 'On going':
                    $statusClass = 'text-[#F0C419]';
                    break;
                case 'Cancel':
                    $statusClass = 'text-[#DF0000]';
                    break;
                default:
                    $statusClass = 'text-gray-500';
                    break;
            }
        @endphp
        <p class="text-lg font-semibold text-justify {{ $statusClass }} mb-5">{{ ucfirst($order->order_status) }}</p>

        <h2 class="text-lg font-semibold text-black text-left text-balance mb-2">Payment Summary</h2>

        <div class="container">
          <div class="flex">
            <h2 class="text-base font-normal text-gray-500 text-left text-balance mb-2 mr-5">Session Fee (1Hr)</h2>
            <p class="text-base font-semibold text-justify text-black mb-5">Rp {{number_format($order->price, 0, ',', '.')}}</p>
          </div>
          
          <div class="flex">
            <h2 class="text-base font-normal text-gray-500 text-left text-balance mb-2 mr-5">Service Fee</h2>
            <p class="text-base font-semibold text-justify text-black mb-5">Rp 2.000</p>
          </div>

          <div class="flex">
            <h2 class="text-base font-normal text-gray-500 text-left text-balance mb-2 mr-5">Payment</h2>
            <p class="text-base font-semibold text-justify text-black mb-5">Rp {{number_format(($order->price + 2000), 0, ',', '.')}}</p>
          </div>
        </div>

      </div>
    </div>
@endsection