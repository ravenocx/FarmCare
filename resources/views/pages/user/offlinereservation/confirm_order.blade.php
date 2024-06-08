@extends('layouts.user.app')

@section('title', 'Consultation - Order')

@section('main-content')
    <div class="flex justify-center mt-32"> <!-- Tambahkan margin atas yang lebih besar -->
        <div class="text-base text-center"> <!-- Tambahkan text-center untuk teks tengah -->
            <p class="font-semibold bg-secondaryColor rounded-3xl py-6 px-64 mb-4">Hello! Thank you for order! ♡</p> <!-- Tambahkan margin bawah -->
            <div class="flex items-center justify-center mb-5">
                <img src="{{ asset('images/icon/order-status.svg') }}" class="mr-2"> <!-- Tambahkan margin kanan -->
                <p>Status Order: <span class="font-medium text-[#FBBC04]">{{ $order->order_status }}</span></p>
            </div>
        </div>
    </div>

    <div class="flex justify-center mb-20">
        <div class="text-base text-center"> <!-- Tambahkan text-center untuk teks tengah -->
            <p>Please wait, the doctor will look at the order and contact you according to the schedule</p>
            
        </div>
    </div>


@endsection