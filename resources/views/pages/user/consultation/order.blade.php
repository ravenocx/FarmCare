@extends('layouts.user.app')

@section('title', 'Consultation - Order')

@section('main-content')
    <div class="flex justify-center mt-16">
        <div class="text-base">
            <p class="font-semibold bg-secondaryColor rounded-3xl py-6 px-64 mb-2">Hello! Thank you for order! ♡</p>
            <div class="flex items-center justify-center mb-5">
                <img src="{{asset('images/icon/order-status.svg')}}">
                <p class="ml-2">Status Order: <span class="font-mediums text-[#FBBC04]">{{$order->order_status}}</span></p>
            </div>

        </div>
    </div>

    <div class="flex justify-center mb-20">
        <div class="text-base">
            <p>Please contact the following for the next stage of consultation.</p>
            <div class="mt-4">
                <p>Before that, here step by step after payment to get a consultation: </p>
                <a href="{{$whatsapp_link}}" class="font-semibold my-4 underline flex justify-center" target="blank">
                WhatsApp Link
                </a>
                <ol class="list-decimal pl-4">
                    <li>Click WhatsApp link above </li>
                    <li>The link will direct you to private chat in WhatsApp to Veteranian</li>
                    <li>After that, please send the pre-built chat before doing consultation, which <br> contains, transaction id, order date and customer name</li>
                    <li>Veterinarian will chat you based on their waiting list</li>
                </ol>
            </div>
            
        </div>
    </div>

    @if (session('success'))
        <x-alert-notification type="success" message="{{session('success')}}" />
    @endif
@endsection