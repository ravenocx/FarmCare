@extends('layouts.user.app')

@section('title','FarmCare - Medication Delivery')

@section('main-content')
<div class="mb-5 ml-[100px]">
  <h2 class="pt-8 font-medium text-3xl">Buy Medicine</h2>
</div>

<div class="container flex flex-col items-center mx-auto my-4">
  <img src="{{ asset('images/icon/payment-success.svg') }}" alt="payment-success" class="mb-4">
  <p class="font-medium text-xl">Payment Success</p>
  
  <div class="flex justify-center mt-10">
    <a href="{{ route('user.medicdeliv.status', ['id' => $medication->id]) }}">
      <button class="btn-base w-[650px] mt-auto bg-shadeBrown font-bold text-lg text-white mb-8 rounded py-2 px-5 hover:text-shadeBrown hover:bg-white hover:outline hover:outline-1">See Delivery Information</button>
    </a>
  </div>
</div>

@endsection