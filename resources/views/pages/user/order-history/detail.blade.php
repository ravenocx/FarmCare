@extends('layouts.user.app')

@section('title' ,'FarmCare - Order History')

@section('main-content')


@if ($order->service_category == 'consultation')
    <div class="mx-28 my-10">
        <div class="ml-16 mt-9 pb-10">
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
                        <img src="{{asset($order->veterinarian->photo ? :'images/icon/profile-icon.svg')}}" alt="profile-image" class="object-fill w-[73px] h-20 rounded-lg border border-shadeBrown">
                        <div class="ml-4">
                            <p class="mb-1">{{$order->veterinarian->gender == 'male'  ? 'Dr.' : 'Dra.' .$order->veterinarian->name}}</p>
                            <a href="https://wa.me/{{$order->veterinarian->phone_number}}"  target="blank">
                                (<span class="underline mb-5">{{$order->veterinarian->phone_number}}</span>)
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

                    <div class="w-[420px] grid grid-cols-2 gap-y-1 gap-x-16 font-medium">
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
    </div>
    <a href="" class="flex justify-center mb-20">
        <button class="btn mt-auto bg-shadeBrown font-bold text-lg text-white rounded py-2 px-5 hover:text-shadeBrown hover:bg-white hover:border">View Medicine</button>
    </a>
@else
    <div class="mx-28 my-10 pb-10">
        <h1 class="font-semibold text-2xl mb-8">Detail Order History</h1>

        <div class="flex">
            <div class="flex flex-col justify-around font-medium text-lg w-1/2 border-shadeBrown border-r-2">
                <div class="mb-5">
                    <h3 class="text-mediumGray mb-1 text-lg">Service</h3>
                    <h3 class="mb-1 text-xl">{{ $order->service_category == 'consultation' ? 'Online Consultation' : 'Offline Reservation' }}</h3>
                </div>

                <div>
                    <h3 class="text-mediumGray mb-1">Address Reservation</h3>
                    <p>{{$order->order_address}}</p>
                </div>

                <div>
                    <h3 class="text-mediumGray mb-1 text-sm">On Duty</h3>
                    <div class="flex items-center mb-6">
                        <img src="{{asset($order->veterinarian->photo ? :'images/icon/profile-icon.svg')}}"
                            alt="profile-image" class="object-fill w-[73px] h-20 rounded-lg border border-shadeBrown">
                        <div class="ml-4">
                            <p class="mb-1">{{$order->veterinarian->name}}</p>
                            <p class="text-mediumGray mb-1">{{$order->veterinarian->specialist}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-1/2 font-medium pl-12 text-lg">
                <div class="grid grid-cols-2 mb-3">
                    <h3 class="text-mediumGray mb-1">Order ID</h3>
                    <h3 class="text-mediumGray mb-1">Delivered On</h3>
                    <p>Order{{$order->id}}</p>
                    <p>{{ Carbon\Carbon::parse($order -> appointment_date)->format('d  M Y') }}</p>
                </div>
                <div class="mb-8">
                    <h3 class="text-mediumGray mb-1">Status</h3>

                    <p
                        class="{{$order->order_status == 'Complete' ? 'text-green-500' : ($order->order_status == 'Cancel' ? 'text-red-500' : 'text-yellow-500')}}">
                        {{$order->order_status}}</p>
                </div>


                <h2 class="font-semibold text-xl mb-10">Payment Summary</h2>

                <div class="w-[420px] grid grid-cols-2 gap-y-1 gap-x-16 font-medium">
                    <p class="text-mediumGray ">Session Fee (1Hr)</p>
                    <p class="text-right">Rp {{number_format($order->price, 0, ',', '.')}}</p>
                    <p class="text-mediumGray">Service Fee</p>
                    <p class="text-right">Rp 2.500</p>
                    <p class="text-mediumGray mt-5 ">Total Payment</p>
                    <p class="text-right mt-5">Rp {{number_format($order->price + 2500, 0, ',', '.')}}</p>
                </div>
            </div>
        </div>
    </div>
@endif

@endsection
