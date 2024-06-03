@extends('layouts.user.app')

@section('title','FarmCare - Online Consultation')

@section('main-content')

    <h1 class="font-semibold mt-11 ml-24 text-3xl">Order History</h1>

    <div class="ml-36 mt-14 pr-20 mb-20">
        @foreach ($orders as $index => $order )
            <div class="pb-7 border-shadeCream {{count($orders) == 1 ? '' : 'border-b-2 mb-5' }} ">
                <div class="flex text-xl font-medium mb-6">
                    <p class="text-[#8C8F93]">Order Date</p>
                    <p class="ml-5">{{ Carbon\Carbon::parse($order -> order_date)->format('d/m/Y') }}</p>
                    <p class="text-[#8C8F93] ml-32">Order ID</p>
                    <p class="ml-5">Order-{{$order->id}}</p>
                </div>

                <div class="flex items-center bg-secondaryColor py-5 pl-8 pr-4">

                    <img src="{{asset($order->veterinarian->photo ? : 'images/icon/profile-icon.svg')}}" alt="profile-image" class="object-fill w-[73px] h-20 rounded-lg border border-shadeBrown">

                    <div class="text-lg ml-4">
                        <p class="font-medium mb-1">{{$order->veterinarian->gender === 'male' ? 'Dr.' . $order->veterinarian->name : 'Dra.' . $order->veterinarian->name}}</p>
                        <p class="text-mediumGray">{{$order->veterinarian->specialist}} Specialist</p>
                    </div>

                    <div class="text-lg ml-36 mr-20">
                        <p class="text-mediumGray mb-3">Service</p>
                        <p class="font-medium">{{$order->service_category == 'consultation' ? 'Online Consultation' : 'Offline Reservation'}}</p>
                    </div>

                    <div class="text-lg">
                        <p class="text-mediumGray mb-3">Status</p>
                        <p class="font-medium {{$order->order_status == 'Complete' ? 'text-green-500' : ($order->order_status == 'Cancel' ? 'text-red-500' : 'text-yellow-500')}}">{{$order -> order_status}}</p>
                    </div>

                    <a href="{{route('veterinarian.consultation.order.detail', ['id' => $order->id])}}" class="ml-auto mr-10">
                        <button class="btn-lg bg-white border-black border font-medium text-lg rounded-lg py-5 px-7 hover:bg-shadeBrown hover:text-white hover:border-none">View Order Detail</button>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection