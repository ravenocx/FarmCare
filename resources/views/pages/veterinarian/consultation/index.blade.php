@extends('layouts.veterinarian.app')

@section('title', 'Veterinarian - Consultation')

@section('main-content')
    <div class="flex justify-between mr-6 mb-12">
        <h1 class="font-medium text-4xl">Online Consultation</h1>
        <a href="{{route('veterinarian.consultation.schedule.create')}}">
            <button class="btn-base w-full bg-[#C8B6A6] font-bold text-base text-white rounded py-2 px-5 hover:text-shadeBrown hover:bg-white hover:outline hover:outline-1">Add Schedule</button>
        </a>
    </div>

    <div class="flex justify-between mr-6">
        <h2 class="font-semibold text-base mb-5">Schedules</h2>
        <a href="{{route('veterinarian.consultation.schedule')}}" class="font-semibold text-shadeBrown text-base"> View All ></a>
    </div>
    <div class="flex justify-center">
        @foreach($serviceSchedules as $index => $serviceSchedule)
            <div class="{{ $index == 0 ? (count($serviceSchedules) === 1 ? '' : 'pr-6 border-r-2') : ($index == 1 ? 'px-6 border-r-2' : 'pl-6') }}  border-shadeCream">
                <div class="flex text-xs">
                    <img src="{{Auth::guard('veterinarian')->user()->photo ? : asset('images/assets/vet-schedule-image.svg')}}" class="rounded-lg border border-shadeBrown w-[150px] h-28">
                    <div class="ml-2 space-y-2">
                        <p class="font-bold">{{(Auth::guard('veterinarian')->user()->gender == 'male' ? 'Dr.' :'Dra.') . Auth::guard('veterinarian')->user()->name}}</p>
                        <p class="font-bold">Online Consultation</p>
                        <p class="text-[#FF0000]">{{ Carbon\Carbon::parse($serviceSchedule->schedule_start)->format('d/m/Y') }} {{ Carbon\Carbon::parse($serviceSchedule->schedule_start)->format('H:i') }} - {{ Carbon\Carbon::parse($serviceSchedule->schedule_end)->format('H:i') }}</p>
                        @if($serviceSchedule->is_reserved)
                            <p class="text-green-800">Reserved</p>
                        @else
                            <p class="text-yellow-400">Not Reserved</p>
                        @endif
                    </div>
                </div>
        
                <div class="flex justify-center mt-5 space-x-3">
                    <a href="">
                        <button class="btn-base bg-shadeBrown font-bold text-xs text-white rounded py-2 px-5 hover:text-shadeBrown hover:bg-white hover:outline hover:outline-1">Edit</button>
                    </a>
                    <a href="">
                        <button class="btn-base bg-[#DF0000] font-bold text-xs text-white rounded py-2 px-3">Cancel</button>
                    </a>
                </div>
            </div>
        @endforeach
    </div>


@endsection