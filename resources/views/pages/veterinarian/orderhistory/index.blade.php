@extends('layouts.veterinarian.app')

@section('title', 'Veterinarian - Order History')

@section('main-content')
    <div class="mb-5">
        <h2 class="font-medium text-3xl">Patient</h2>
    </div>

    <div class ="flex">
      <div class="w-[350px] h-auto rounded-lg overflow-hidden bg-secondaryColor dark:bg-surface-dark dark:text-white mr-8">
          <div class="p-5">
              <h2 class="text-lg font-normal text-gray-500 text-left text-balance mb-2">Total Patient</h2>
              <p class="text-base font-semibold text-justify text-black">{{ $totalPatients }}</p>
          </div>
      </div>
      
      <div class="w-[350px] h-auto rounded-lg overflow-hidden bg-secondaryColor dark:bg-surface-dark dark:text-white mr-8">
          <div class="p-5">
              <h2 class="text-lg font-normal text-gray-500 text-left text-balance mb-2">Offline Reservation</h2>
              <p class="text-base font-semibold text-justify text-black">{{ $offlineReservations }}</p>
          </div>
      </div>

      <div class="w-[350px] h-auto rounded-lg overflow-hidden bg-secondaryColor dark:bg-surface-dark dark:text-white mr-8">
          <div class="p-5">
              <h2 class="text-lg font-normal text-gray-500 text-left text-balance mb-2">Online Consultation</h2>
              <p class="text-base font-semibold text-justify text-black">{{ $onlineConsultations }}</p>
          </div>
      </div>

      <div class="w-[350px] h-auto rounded-lg overflow-hidden bg-secondaryColor dark:bg-surface-dark dark:text-white mr-8">
          <div class="p-5">
              <h2 class="text-lg font-normal text-gray-500 text-left text-balance mb-2">Ongoing Appointments</h2>
              <p class="text-base font-semibold text-justify text-black">{{ $ongoingAppointments }}</p>
          </div>
      </div>
    </div>

    <div class="mb-5">
        <h2 class="mt-14 font-medium text-3xl">Order History</h2>
    </div>

    @foreach($orders as $index => $order)
        <div class="pb-7 border-shadeCream {{count($orders) == 1 ? '' : 'border-b-2 mb-5' }} ">
            <div class="flex text-xl font-medium mb-6">
                <p class="text-[#8C8F93]">Order Date</p>
                <p class="ml-5">{{ Carbon\Carbon::parse($order -> order_date)->format('d/m/Y') }}</p>
                <p class="text-[#8C8F93] ml-32">Order ID</p>
                <p class="ml-5">Order-{{$order -> id}}</p>
            </div>

            <div class="flex items-center bg-secondaryColor py-5 pl-8 pr-4">

                <img src="{{asset($order->user->photo ? :'images/icon/profile-icon.svg')}}" alt="profile-image" class="object-fill w-[73px] h-20 rounded-lg border border-shadeBrown">

                <div class="text-lg ml-4">
                    <p class="font-medium mb-1">{{$order -> cust_name}}</p>
                    <p class="text-mediumGray">{{$order -> cust_phone_number}}</p>
                </div>

                <div class="text-lg ml-36 mr-20">
                    <p class="text-mediumGray mb-3">Service</p>
                    <p class="font-medium">Online Consultation</p>
                </div>

                <div class="text-lg">
                    <p class="text-mediumGray mb-3">Status</p>
                    <p class="font-medium {{$order->order_status === 'Complete' ? 'text-green-500' : 'text-red-500' }}">{{$order -> order_status}}</p>
                </div>

                <a href="{{route('veterinarian.order.detail', ['id' => $order->id])}}" class="ml-auto mr-10">
                    <button class="btn-lg bg-white border-black border font-medium text-lg rounded-lg py-5 px-7 hover:bg-shadeBrown hover:text-white hover:border-none">Order Detail</button>
                </a>
            </div>
        </div>
        @endforeach
@endsection