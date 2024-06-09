@extends('layouts.veterinarian.app')

@section('title', 'Veterinarian - Offline Reservation')

@section('main-content')

<a class="flex items-center space-x-2 ml-4" href="{{url('/veterinarian/offline-reservation')}}">
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
    <div class="ml-4">
        <p class="mb-1">
            <strong>Name : </strong> {{$order->cust_name}}
        </p>
        <p class="mb-1">
            <strong>Address : </strong> {{$order->order_address}}
        </p>
        <p class="mb-1">
            <strong>Phone Number : </strong> 
            <a href="https://wa.me/{{$order->cust_phone_number}}" target="_blank" class="underline">
                {{$order->cust_phone_number}}
            </a>
        </p>
    </div>
</div>

                <h3 class="text-mediumGray mb-1">Invoice</h3>
                <a href="{{ asset('/storage/' . $order->payment_proof) }}" target="_blank" class="underline">
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
                    <p class="text-mediumGray mt-5 " >Total Payment</p>
                    <p class="text-right mt-5">Rp {{number_format($order->price, 0, ',', '.')}}</p>
                </div>
            </div>
        </div>
    </div>

    
@endsection