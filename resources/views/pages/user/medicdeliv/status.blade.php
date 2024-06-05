@extends('layouts.user.app')

@section('title','FarmCare - Medication Delivery')

@section('main-content')
<div class="mb-5 ml-[100px]">
  <h2 class="pt-8 font-medium text-3xl">Buy Medicine</h2>
</div>

<div class="container flex flex-col items-center mx-auto my-4">
  <div class="block max-w-sm p-6 bg-[#FFF8F0] border border-[#C8B6A6] rounded-lg w-[500px]">
  <ul class="timeline timeline-vertical">
        <li>
            @if ($medication->created_at)
                <div class="timeline-start">{{ $medication->created_at->format('d M') }}</div>
            @endif
            <div class="timeline-middle">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none" class="w-5 h-5">
                    <circle cx="10" cy="10" r="8" stroke="#E64B32" stroke-width="2" fill="#E64B32" />
                </svg>
            </div>
            <div class="timeline-end timeline-box bg-[#8D7B68] rounded-lg text-white text-balance w-40 h-auto">{{ $medication->order_status }}</div>
            <hr/>
        </li>
    </ul>
  </div>
  
  <div class="flex justify-center mt-10">
    <a href="">
      <button class="btn-base w-[650px] mt-auto bg-shadeBrown font-bold text-lg text-white mb-8 rounded py-2 px-5 hover:text-shadeBrown hover:bg-white hover:outline hover:outline-1">Received Order</button>
    </a>
  </div>
</div>
@endsection
