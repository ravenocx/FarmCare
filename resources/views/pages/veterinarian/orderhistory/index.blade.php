@extends('layouts.veterinarian.app')

@section('title', 'Veterinarian - Order History')

@section('main-content')
    <div class="mb-5">
        <h2 class="pt-8 font-medium text-3xl">Patient</h2>
    </div>

    <div class ="flex">
      <div class="w-[350px] h-auto rounded-lg overflow-hidden bg-[#FFF8F0] dark:bg-surface-dark dark:text-white mr-8">
          <div class="pt-2 pb-3 pl-3 pr-3">
              <h2 class="text-lg font-normal text-gray-500 text-left text-balance">Total Patient</h2>
              <p class="text-base font-semibold text-justify text-black">{{ $totalPatients }}</p>
          </div>
      </div>
      
      <div class="w-[350px] h-auto rounded-lg overflow-hidden bg-[#FFF8F0] dark:bg-surface-dark dark:text-white mr-8">
          <div class="pt-2 pb-3 pl-3 pr-3">
              <h2 class="text-lg font-normal text-gray-500 text-left text-balance">Offline Reservation</h2>
              <p class="text-base font-semibold text-justify text-black">{{ $offlineReservations }}</p>
          </div>
      </div>

      <div class="w-[350px] h-auto rounded-lg overflow-hidden bg-[#FFF8F0] dark:bg-surface-dark dark:text-white mr-8">
          <div class="pt-2 pb-3 pl-3 pr-3">
              <h2 class="text-lg font-normal text-gray-500 text-left text-balance">Online Consultation</h2>
              <p class="text-base font-semibold text-justify text-black">{{ $onlineConsultations }}</p>
          </div>
      </div>

      <div class="w-[350px] h-auto rounded-lg overflow-hidden bg-[#FFF8F0] dark:bg-surface-dark dark:text-white mr-8">
          <div class="pt-2 pb-3 pl-3 pr-3">
              <h2 class="text-lg font-normal text-gray-500 text-left text-balance">Ongoing Appointments</h2>
              <p class="text-base font-semibold text-justify text-black">{{ $ongoingAppointments }}</p>
          </div>
      </div>
    </div>

    <div class="mb-5">
        <h2 class="pt-8 font-medium text-3xl">Order History</h2>
    </div>

    @foreach($orders as $order)

    <div class="flex">
        <div class="flex mr-5">
            <p for="order_date" class="text-gray-500 mr-5">Delivered On </p>
            <div class="font-semibold">
                {{$order->order_date->format('d F Y')}}
            </div>
        </div>

        <div class="flex">
            <p class="text-gray-500 mr-5">Order ID</p>
            <div class="font-semibold">
                {{$order->id}}
            </div>
        </div>
    </div>
    
    <div class="mt-5 mr-8">
        <div class="w-500 h-auto rounded-lg overflow-hidden bg-[#FFF8F0] flex mb-10">
            <div class="pt-4 pb-3 pl-3 pr-3 flex">

                <img src="{{asset($order->user->photo ? :'images/icon/profile-icon.svg')}}" alt="profile-image" class="object-fill w-[73px] h-20 rounded-lg border border-shadeBrown">
                <div class="pt-4 pb-3 pl-3 pr-3 mr-20">
                    <p class="font-bold text-lg">{{$order->cust_name}}</p>
                    <p class="text-mediumGray">{{$order -> cust_phone_number}}</p>
                </div>

                <div class="pt-4 pb-3 pl-3 pr-3 mr-20">
                    <h2 class="text-lg font-normal text-gray-500 text-left text-balance">Service</h2>
                    <p class="text-base font-semibold text-justify text-black">{{$order->service_category}}</p>
                </div>

                <div class="pt-4 pb-3 pl-3 pr-3 mr-20">
                    <p class="{{$order->order_status == 'Complete' ? 'text-green-500' : ($order->order_status == 'Cancel' ? 'text-red-500' : 'text-yellow-500')}}">{{$order->order_status}}</p>
                </div>
            </div>
            <a href="{{ route('veterinarian.orderhistory.detail', ['id' => $order->id]) }}" class="btn border-gray-800 bg-white text-[#8D7B68] text-sm text-center mt-[40px] ml-[100px]">Order Detail</a>
        </div>
    </div>
    @endforeach
@endsection