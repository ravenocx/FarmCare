@extends('layouts.user.app')

@section('title', 'FarmCare - Medication Delivery')

@section('main-content')
<div class="mb-5 mt-16 ml-[100px] pl-3">
    <h2 class="font-medium text-3xl">Buy Medicine</h2>
</div>

<div class="mx-auto ml-[100px] mr-[90px] flex grid grid-cols-2 divide-x-2 divide-gray-300 border-t-2 border-gray-300">
    <div class="container pr-2">
        <div class="mb-2 pl-3">

            <h2 class="text-2xl font-medium text-black text-left text-balance mb-2 mt-10">Drug Reccomendations</h2>
            <p class="mt-9 flex font-medium text-base">
            Order-{{$order->id}} | {{Carbon\Carbon::parse($order->order_date)->format('d F Y, H.i')}}
            </p>
            <p class="flex font-medium text-base">
            {{count($order->medications)}} Produk, Rp. {{ number_format($totalPrice, 0, ',', '.') }}
            </p>

            <h2 class="text-2xl font-medium text-black text-left text-balance mb-2 mt-7">Daftar Pesanan</h2>
            
            <div class="mt-7 mr-7">
                @foreach ($order->medications as $medication )
                    <div class="flex justify-between">
                        <p class="text-2xl font-medium">- {{$medication->medicine}}</p>
                        <p class="text-2xl font-medium">Rp {{ number_format($medication->price, 0, ',', '.') }}</p>
                    </div> 
                    <p class="text-base font-medium ml-5">x{{$medication->quantity}}</p>
                @endforeach
            </div>

        </div>
    </div>

    <div class="container pr-2 pl-5">
        <h2 class="text-2xl font-medium text-black text-left text-balance mb-2 mt-10">Ringkasan Pembayaran</h2>

        <div class="container mt-5">
            <div class="flex">
                <h2 class="text-base font-medium text-black text-left text-balance mb-2 mr-5">Subtotal</h2>
                <p class="text-base font-semibold text-justify text-black mb-5 ml-auto">Rp {{ number_format($totalPrice, 0, ',', '.') }}</p>
            </div>

            <div class="flex">
                <h2 class="text-base font-medium text-black text-left text-balance mb-2 mr-5">Biaya Pengiriman</h2>
                <p class="text-base font-semibold text-justify text-black mb-5 ml-auto">Rp 15.000</p>
            </div>

            <div class="flex">
                <h2 class="text-base font-medium text-black text-left text-balance mb-2 mr-5">Biaya Layanan</h2>
                <p class="text-base font-semibold text-justify text-black mb-5 ml-auto">Rp 5.000</p>
            </div>

            <div class="flex">
                <h2 class="text-xl font-semibold text-black text-left text-balance mb-2 mr-5">Total</h2>
                <p class="text-xl font-semibold text-justify text-black mb-5 ml-auto">Rp {{ number_format($totalPrice + 15000 + 5000, 0, ',', '.') }}</p>
            </div>
        </div>

        @if($medication->address)
            <h2 class="text-xl font-bold text-left text-balance mb-2">Alamat Pengiriman</h2>
            <p class="text-gray-700 text-base">{{$medication->address}}</p>
        @else
            <form action="{{route('user.medicdeliv.address.edit', ['id' => $medication -> id])}}" method="post">
                @csrf
                @method('PATCH')
                <div class="items-center mb-2">
                    <label class="text-xl font-bold text-black text-left text-balance" for="address">Alamat Pengiriman</label>
                    <br>
                    <input type="text" name="address" id="address" class="mt-5 w-full rounded-xl border-black border-2 h-20 p-4">
        
                    <div class="flex justify-center font-medium text-base text-white space-x-7 mt-6">
                        <button type="reset" class="btn-lg bg-[#DF0000] rounded py-2 px-10">Cancel</button>
                        <button type="submit" class="btn-lg bg-shadeBrown rounded py-2 px-10 hover:text-shadeBrown hover:bg-white hover:outline hover:outline-1">Save</button>
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>

@if ($medication->address)
    <div class="flex justify-center mt-20 mb-10">
        <a href="{{route('user.medicdeliv.upload' , ['id' => $medication->id])}}">
            <button class="btn-base w-[600px] mt-auto bg-shadeBrown font-bold text-lg text-white mb-8 rounded w-52 py-4 px-5 hover:text-shadeBrown hover:bg-white hover:outline hover:outline-1 ">Upload Evidence of Transfer</button>
        </a>
    </div>
@else
    <div class="flex justify-center mt-20 mb-10">
        <a href="{{ route('user.medicdeliv.upload' , ['id' => $medication->id]) }}">
            <button class="btn-base w-[600px] mt-auto bg-gray-300 font-bold text-lg text-white mb-8 rounded w-52 py-4 px-5  cursor-not-allowed" disabled>Upload Evidence of Transfer</button>
        </a>
    </div>
    
@endif
@endsection
