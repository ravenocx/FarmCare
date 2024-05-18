@extends('layouts.veterinarian.app')

@section('title', 'Veterinarian - Order History')

@section('main-content')
<div class="mb-5">
        <h2 class="pt-8 font-medium text-3xl">Patient</h2>
    </div>

    <div class ="flex w-full">
      <div class="w-[350px] h-auto rounded-lg overflow-hidden bg-[#FFF8F0] dark:bg-surface-dark dark:text-white mr-8">
          <div class="pt-2 pb-3 pl-3 pr-3">
              <h2 class="text-lg font-normal text-gray-500 text-left text-balance">Total Patient</h2>
              <p class="text-base font-semibold text-justify text-black"></p>
          </div>
      </div>
      
      <div class="w-[350px] h-auto rounded-lg overflow-hidden bg-[#FFF8F0] dark:bg-surface-dark dark:text-white mr-8">
          <div class="pt-2 pb-3 pl-3 pr-3">
              <h2 class="text-lg font-normal text-gray-500 text-left text-balance">Offline Reservation</h2>
              <p class="text-base font-semibold text-justify text-black"></p>
          </div>
      </div>

      <div class="w-[350px] h-auto rounded-lg overflow-hidden bg-[#FFF8F0] dark:bg-surface-dark dark:text-white mr-8">
          <div class="pt-2 pb-3 pl-3 pr-3">
              <h2 class="text-lg font-normal text-gray-500 text-left text-balance">Online Consultation</h2>
              <p class="text-base font-semibold text-justify text-black"></p>
          </div>
      </div>

      <div class="w-[350px] h-auto rounded-lg overflow-hidden bg-[#FFF8F0] dark:bg-surface-dark dark:text-white mr-8">
          <div class="pt-2 pb-3 pl-3 pr-3">
              <h2 class="text-lg font-normal text-gray-500 text-left text-balance">Ongoing Appointments</h2>
              <p class="text-base font-semibold text-justify text-black"></p>
          </div>
      </div>
    </div>

    <div class="mb-5">
        <h2 class="pt-8 font-medium text-3xl">Order History</h2>
    </div>

    <div class="flex">
        <div class="flex mr-5">
            <p for="order_date" class="text-gray-500 mr-5">Delivered On </p>
            <div class="font-semibold">
                20 March 2024
            </div>
        </div>

        <div class="flex">
            <p class="text-gray-500 mr-5">Order ID</p>
            <div class="font-semibold">
                Order1234
            </div>
        </div>
    </div>

    <div class="mt-5 mr-8">
        <div class="w-500 h-auto rounded-lg overflow-hidden bg-[#FFF8F0] flex mb-10">
            <div class="pt-4 pb-3 pl-3 pr-3 flex">
                <img src="images\icon-dokter.png" alt="" class="h-[100px] card-image rounded-md mr-5">
                <div class="pt-4 pb-3 pl-3 pr-3 mr-20">
                    <p class="text-lg font-semibold text-justify text-black">Drh. Putri Nadia L.</p>
                    <h2 class="text-base font-normal text-gray-500 text-left text-balance">Cattle Specialist</h2>
                </div>

                <div class="pt-4 pb-3 pl-3 pr-3 mr-20">
                    <h2 class="text-lg font-normal text-gray-500 text-left text-balance">Service</h2>
                    <p class="text-base font-semibold text-justify text-black">Online Consultation</p>
                </div>

                <div class="pt-4 pb-3 pl-3 pr-3 mr-20">
                    <h2 class="text-lg font-normal text-gray-500 text-left text-balance">Status</h2>
                    <p for="status" class="text-base font-semibold text-justify text-yellow-300">On Going</p>
                </div>
            </div>

            <!-- <button href="" class="h-[60px] w-[150px] text-[#8D7B68] font-semibold bg bg-white border border-gray-800 font-medium rounded-lg text-sm text-center mt-[40px] ml-[100px]">Order Detail</button> -->
            <a href="{{ route('veterinarian.orderhistory.detail') }}" class="btn btn-white mt-[40px] ml-[100px]">Order Detail</a>

        </div>
    </div>
@endsection