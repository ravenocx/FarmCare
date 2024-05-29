@extends('layouts.user.app')

@section('title','FarmCare - Medication Delivery')

@section('main-content')
<div class="flex items-center mb-5 ml-[100px]">
  <h2 class="pt-8 font-medium text-3xl">Buy Medicine</h2>
</div>

<form action="" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="flex flex-col items-center justify-center border border-[#F1DEC9] rounded-lg w-[550px] h-[350px] mx-auto my-4">
    <div class="flex items-center justify-center w-full">
      <div class="text-mediumGray">Account Number</div>
      <div class="font-medium text-black ml-[200px]">123456789</div>
    </div>
    <div class="mt-2 text-mediumGray ml-[310px]">(Farm Care Plus)</div>

    <div class="flex items-center justify-center w-full mt-7">
      <label id="dropzone-file" for="dropzone-file-input" class="flex flex-col items-center justify-center w-[350px] h-[150px] border border-shadeBrown rounded-lg cursor-pointer hover:bg-gray-100">
        <div id="upload-container" class="flex flex-col items-center justify-center pt-5 pb-6">
          <img src="{{asset('images/vector/cloud-upload.svg')}}">
          <p class="mb-2 text-sm text-mediumGray"><span class="font-semibold">Upload</span> proof of your payment</p>
          <p class="text-xs text-mediumGray">in png or jpg file</p>
        </div>
        <input id="dropzone-file-input" type="file" name="payment_proof" class="hidden" required />
      </label>
    </div>
  </div>
</form>

<div class="flex justify-center mt-10">
  <a href="{{ route('user.medicdeliv.success') }}">
    <button class="btn-base w-[650px] mt-auto bg-shadeBrown font-bold text-lg text-white mb-8 rounded py-2 px-5 hover:text-shadeBrown hover:bg-white hover:outline hover:outline-1">Process to Payment</button>
  </a>
</div>

@endsection