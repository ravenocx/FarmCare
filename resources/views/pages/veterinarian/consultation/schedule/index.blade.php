@extends('layouts.veterinarian.app')

@section('title', 'Veterinarian - Online Consultation Schedule')

@section('main-content')
    <a class="flex items-center space-x-2 ml-4" href="{{route('veterinarian.consultation')}}">
        <img src="{{asset('images/vector/back-vector.svg')}}" >
        <p class="text-base text-primaryColor">Back</p>
    </a>

    <div class="ml-16 mt-9">
        <h1 class="font-semibold text-2xl mb-7">Online Consultation Schedule</h1>

        <div class="grid grid-cols-3">
            @foreach($serviceSchedules as $index => $serviceSchedule)
            <div class=" border-b-2 border-shadeCream py-4">
                <div class="flex">
                    <div class="{{ $index % 3 == 0 ? ($index === count($serviceSchedules)- 1 ? '' : 'pr-6 border-r-2') : (($index + 1) % 3 == 0  ? 'pl-6' : 'px-6 border-r-2') }}  border-shadeCream">
                        <div class="flex text-sm">
                            <img src="{{Auth::guard('veterinarian')->user()->photo ? : asset('images/assets/vet-schedule-image.svg')}}" class="rounded-lg border border-shadeBrown w-[150px] h-28">
                            <div class="w-[224.22px] ml-2 space-y-2">
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
                            @if(Carbon\Carbon::parse($serviceSchedule->schedule_end)->isAfter(Carbon\Carbon::now()))
                                <a href="">
                                    <button class="btn-base bg-shadeBrown font-bold text-xs text-white rounded py-2 px-5 hover:text-shadeBrown hover:bg-white hover:outline hover:outline-1">Edit</button>
                                </a>
                                <a href="">
                                    <button class="btn-base bg-[#DF0000] font-bold text-xs text-white rounded py-2 px-3">Cancel</button>
                                </a>
                            @else
                                <button class="btn-base bg-gray-300 text-xs font-bold text-white rounded py-2 px-5 cursor-not-allowed" disabled>Schedule Ended</button>
                            
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-16 pb-10">
            <!-- {{$serviceSchedules->links()}} -->

            {{ $serviceSchedules->links('vendor.pagination.tailwind') }}
        </div>
    </div>
@endsection