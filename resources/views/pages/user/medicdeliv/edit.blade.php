@extends('layouts.user.app')

@section('title','FarmCare - Medication Delivery')

@section('main-content')
<div class="flex items-center ml-[100px] mb-5">
  <!-- <a class="flex items-center space-x-2 mt-8" href="{{ route('user.medicdeliv') }}">
      <img src="{{ asset('images/vector/back-vector.svg') }}">
      <p class="text-base text-primaryColor">Back</p>
  </a> -->
  
  <div class="ml-3">
    <h2 class="pt-8 font-medium text-3xl">Buy Medicine</h2>
  </div>
</div>

<div class="mx-auto ml-[90px] mr-[90px] flex grid grid-cols-2 divide-x-2 divide-gray-300 border-t-2 border-gray-300">
  <div class="container pr-2">
    <div class="mb-2 ml-3">
      <h2 class="text-2xl font-medium text-black text-left text-balance mb-2 mt-5">Drug Recommendations</h2>
      <h2 class="text-base font-medium text-black text-left text-balance mb-2">id</h2>

      <h2 class="text-2xl font-medium text-black text-left text-balance mb-2 mt-5">Daftar Pesanan</h2>
    </div>
  </div>

  <div class="container pr-2 pl-5">
      <h2 class="text-2xl font-medium text-black text-left text-balance mb-2 mt-5">Ringkasan Pembayaran</h2>

      <div class="container mt-5">
          <div class="flex">
            <h2 class="text-base font-medium text-black text-left text-balance mb-2 mr-5">Subtotal</h2>
            <p class="text-base font-semibold text-justify text-black mb-5">Rp </p>
          </div>
          
          <div class="flex">
            <h2 class="text-base font-medium text-black text-left text-balance mb-2 mr-5">Biaya Pengiriman</h2>
            <p class="text-base font-semibold text-justify text-black mb-5">Rp 15.000</p>
          </div>

          <div class="flex">
            <h2 class="text-base font-medium text-black text-left text-balance mb-2 mr-5">Biaya Layanan</h2>
            <p class="text-base font-semibold text-justify text-black mb-5">Rp 5.000</p>
          </div>

          <div class="flex">
            <h2 class="text-xl font-semibold text-black text-left text-balance mb-2 mr-5">Total</h2>
            <p class="text-xl font-semibold text-justify text-black mb-5">Rp </p>
          </div>
        </div>

        <div class="flex items-center mb-2">
            <h2 class="text-xl font-medium text-black text-left text-balance">Alamat Pengiriman</h2>
            <a class="text-base font-semibold text-gray-400 text-balance ml-[380px]" href="{{route('user.medicdeliv.edit')}}">Edit</a>
        </div>

      <p class="text-lg font-medium text-balance text-gray-500 mb-2">Jalan H. Ummayah II, Jl. Sukabirus, Citeureup, Dayeuhkolot, Bandung Regency, West Java 40257, Indonesia</p>
  </div>
</div>

<div class="flex justify-center mt-10 mb-10">
  <a href="{{ route('user.medicdeliv') }}">
    <button class="btn-base w-[600px] mt-auto bg-shadeBrown font-bold text-lg text-white mb-8 rounded w-52 py-2 px-5 hover:text-shadeBrown hover:bg-white hover:outline hover:outline-1">Save</button>
  </a>
</div>
@endsection