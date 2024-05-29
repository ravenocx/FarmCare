@extends('layouts.user.app')

@section('title', 'FarmCare - Medication Delivery')

@section('main-content')
<div class="mb-5 ml-[100px]">
    <h2 class="pt-8 font-medium text-3xl">Buy Medicine</h2>
</div>

<div class="mx-auto ml-[90px] mr-[90px] flex grid grid-cols-2 divide-x-2 divide-gray-300 border-t-2 border-gray-300">
    <div class="container pr-2">
        <div class="mb-2 ml-3">
            <h2 class="text-2xl font-medium text-black text-left text-balance mb-2 mt-5">Drug Recommendations</h2>
            <h2 class="text-base font-medium text-black text-left text-balance mb-2">id: {{ $medication->id }}</h2>

            <h2 class="text-2xl font-medium text-black text-left text-balance mb-2 mt-5">Daftar Pesanan</h2>
            
            <div class="flex">
              <h2 class="text-base font-medium text-black text-left text-balance mb-2 mr-auto">{{ $medication->medicine }}</h2>
              <h2 class="text-base font-medium text-black text-left text-balance mb-2">Rp {{ number_format($medication->price, 0, ',', '.') }}</h2>
            </div>

            <h2 class="text-sm font-medium text-black text-left text-balance mb-2">x{{ $medication->quantity }}</h2>
        </div>
    </div>

    <div class="container pr-2 pl-5">
        <h2 class="text-2xl font-medium text-black text-left text-balance mb-2 mt-5">Ringkasan Pembayaran</h2>

        <div class="container mt-5">
            <div class="flex">
                <h2 class="text-base font-medium text-black text-left text-balance mb-2 mr-5">Subtotal</h2>
                <p class="text-base font-semibold text-justify text-black mb-5 ml-auto">Rp {{ number_format($medication->price, 0, ',', '.') }}</p>
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
                <p class="text-xl font-semibold text-justify text-black mb-5 ml-auto">Rp {{ number_format($medication->price + 15000 + 5000, 0, ',', '.') }}</p>
            </div>
        </div>

        <div class="flex items-center mb-2">
            <h2 class="text-xl font-medium text-black text-left text-balance">Alamat Pengiriman</h2>
            <a class="text-base font-semibold text-gray-400 text-balance ml-auto" href="{{ route('user.medicdeliv.edit', ['id' => $medication->id]) }}">Edit</a>
        </div>

        <p class="text-lg font-medium text-balance text-gray-500 mb-2">{{ $medication->address }}</p>
    </div>
</div>

<div class="flex justify-center mt-10 mb-10">
    <a href="{{ route('user.medicdeliv.upload') }}">
        <button class="btn-base w-[600px] mt-auto bg-shadeBrown font-bold text-lg text-white mb-8 rounded w-52 py-2 px-5 hover:text-shadeBrown hover:bg-white hover:outline hover:outline-1">Upload Evidence of Transfer</button>
    </a>
</div>
@endsection
