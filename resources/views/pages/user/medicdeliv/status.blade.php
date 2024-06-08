@extends('layouts.user.app')

@section('title','FarmCare - Medication Delivery')

@section('main-content')
<div class="mb-5 ml-[100px]">
  <h2 class="pt-8 font-medium text-3xl">Buy Medicine</h2>
</div>

<div class="container flex flex-col items-center mx-auto my-4">
  <div class="block max-w-sm p-6 bg-[#FFF8F0] border border-[#C8B6A6] rounded-lg w-[500px]">
    <ul class="timeline timeline-vertical">
      @foreach($statusTimeline as $index => $status)
      <li class="{{ $status['completed'] ? '' : 'hidden' }}">
        @if ($index > 0 && $statusTimeline[$index - 1]['completed'])
        <hr class="bg-[#E64B32]"/>
        @endif
        
        @if ($status['timestamp'])
        <div class="timeline-start">{{ $status['timestamp'] }}</div>
        @endif
        
        <div class="timeline-middle">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none" class="w-5 h-5">
            <circle cx="10" cy="10" r="8" stroke="#E64B32" stroke-width="2" fill="{{ $status['completed'] ? ($status['status'] == 'Canceled' ? '#E64B32' : '#E64B32') : '#C8B6A6' }}" />
          </svg>
        </div>
        <div class="timeline-end timeline-box {{ $status['completed'] ? ($status['status'] == 'Canceled' ? 'bg-red-600' : 'bg-primaryColor') : 'bg-gray-300' }} rounded-lg text-white text-center w-40 h-auto">{{ $status['status'] }}</div>
        
        @if (isset($statusTimeline[$index + 1]) && $status['completed'] && $statusTimeline[$index + 1]['completed'])
        <hr class="bg-[#E64B32]"/>
        @endif
      </li>
      @endforeach
    </ul>
  </div>
  
  <div class="flex justify-center mt-10">
    <a href="">
      <button class="btn-base w-[650px] mt-auto bg-shadeBrown font-bold text-lg text-white mb-8 rounded py-2 px-5 hover:text-shadeBrown hover:bg-white hover:outline hover:outline-1">Received Order</button>
    </a>
  </div>
</div>
@endsection
