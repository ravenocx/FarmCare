@extends('layouts.veterinarian.app')

@section('title', 'Veterinarian - Detail Order History')

@section('main-content')
    <!-- <a class="flex items-center space-x-2 mb-4" href="{{ route('veterinarian.orderhistory') }}">
        <img src="{{ asset('images/vector/back-vector.svg') }}">
        <p class="text-base text-primaryColor">Back</p>
    </a>

    <div class="flex mb-10">
        <p class="text-black font-semibold text-3xl">Order History Detail</p>
    </div>
     -->
    <a class="flex items-center space-x-2 ml-4" href="{{route('veterinarian.orderhistory')}}">
        <img src="{{asset('images/vector/back-vector.svg')}}" >
        <p class="text-base text-primaryColor">Back</p>
    </a>

    <div class="ml-16 mt-9">
        <h1 class="font-semibold text-2xl mb-12">Order History Detail</h1>

        <div class="flex">
            <div class="font-medium text-lg w-1/2 border-shadeBrown border-r-2">
                <div class="grid grid-cols-2 mb-5">
                    <h3 class="text-mediumGray mb-1">Order ID</h3>
                    <h3 class="text-mediumGray mb-1">Status</h3>
                    <p>Order-{{$order->id}}</p>
                    <p class="{{$order->order_status == 'Complete' ? 'text-green-500' : ($order->order_status == 'Cancel' ? 'text-red-500' : 'text-yellow-500')}}">{{$order->order_status}}</p>
                </div>

                <h3 class="text-mediumGray mb-1">Customer Details</h3>                
                <div class="flex items-center mb-6">
                    <img src="{{asset($order->user->photo ? :'images/icon/profile-icon.svg')}}" alt="profile-image" class="object-fill w-[73px] h-20 rounded-lg border border-shadeBrown">
                    <div class="ml-4">
                        <p class="mb-1">{{$order->cust_name}}</p>
                        <a href="https://wa.me/{{$order->cust_phone_number}}"  target="blank">
                            (<span class="underline mb-5">{{$order->cust_phone_number}}</span>)
                        </a>
                    </div>
                </div>

                <h3 class="text-mediumGray mb-1">Invoice</h3>
                <a href="{{$order -> payment_proof}}" target="_blank" class="underline">
                    Payment Proof Image
                </a>
            </div>

            <div class="w-1/2 font-medium pl-12 text-lg">
                <div class="grid grid-cols-2 mb-10">
                    <h3 class="text-mediumGray mb-1">Service Category</h3>
                    <h3 class="text-mediumGray mb-1">Order Date</h3>
                    <p>{{$order->service_category == 'consultation' ? 'Online Consultation' : 'Offline Reservation'}}</p>
                    <p>{{ Carbon\Carbon::parse($order -> order_date)->format('d/m/Y') }}</p>
                </div>

                <h2 class="font-semibold text-xl mb-10">Payment Summary</h2>

                <div class="w-96 grid grid-cols-2 gap-y-1 gap-x-16 font-medium">
                    <p class="text-mediumGray ">Session Fee (1Hr)</p>
                    <p class="text-right">Rp {{number_format($order->price, 0, ',', '.')}}</p>
                    <p class="text-mediumGray">Service Fee</p>
                    <p class="text-right">Rp 2.500</p>
                    <p class="text-mediumGray mt-5 " >Total Payment</p>
                    <p class="text-right mt-5">Rp {{number_format($order->price + 2500, 0, ',', '.')}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="flex grid grid-cols-2 divide-x-2 divide-[#A4907C]">
      <div class="container pr-2">
        <div class="grid grid-cols-2 mb-5">
            <h3 class="text-mediumGray mb-1">Order ID</h3>
            <h3 class="text-mediumGray mb-1">Status</h3>
            <p>Order-{{$order->id}}</p>
            <p class="{{$order->order_status == 'Complete' ? 'text-green-500' : ($order->order_status == 'Cancel' ? 'text-red-500' : 'text-yellow-500')}}">{{$order->order_status}}</p>
        </div>

        <h2 class="text-base font-normal text-gray-500 text-left text-balance mb-2">Customer Details</h2>
        <div class="flex">
          <img src="{{asset($order->user->photo ? :'images/icon/profile-icon.svg')}}" alt="profile-image" class="object-fill w-[73px] h-20 rounded-lg border border-shadeBrown mr-3">
          <div class="pt-2 pr-3">
              <p class="font-bold text-base">{{$order->cust_name}}</p>
              <a href="https://wa.me/{{$order->cust_phone_number}}"  target="blank">
                  (<span class="underline mb-5">{{$order->cust_phone_number}}</span>)
              </a>
          </div>

          <h3 class="text-mediumGray mb-1">Invoice</h3>
                <a href="{{$order -> payment_proof}}" target="_blank" class="underline">
                    Payment Proof Image
                </a>
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
    </div> -->
@endsection