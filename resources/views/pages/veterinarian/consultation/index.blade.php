@extends('layouts.veterinarian.app')

@section('title', 'Veterinarian - Consultation')

@section('main-content')
    <div class="flex justify-between mr-6 mb-12">
        <h1 class="font-medium text-4xl">Online Consultation</h1>
        <a href="">
            <button class="btn-base w-full bg-[#C8B6A6] font-bold text-base text-white rounded py-2 px-5 hover:text-shadeBrown hover:bg-white hover:outline hover:outline-1">Add Schedule</button>
        </a>
    </div>

    <div class="flex justify-between mr-6">
        <h2 class="font-semibold text-base mb-5">Schedules</h2>
        <a href="" class="font-semibold text-shadeBrown text-base"> View All ></a>
    </div>
    <div class="flex justify-center">
        @for ($i = 0; $i < 3; $i++)
            <div class="{{$i == 0 ? 'pr-6 border-r-2' : ($i == 1 ? 'px-6 border-r-2' : 'pl-6')}}  border-shadeCream">
                <div class="flex text-xs">
                    <img src="{{asset('images/assets/doctor-picture.svg')}}" class="rounded-lg border border-shadeBrown w-48 h-28">
                    <div class="ml-2 space-y-2">
                        <p class="font-bold">Dr. Alexander Grahambell</p>
                        <p class="font-bold">Online Consultation</p>
                        <p class="text-[#FF0000]">19/12/2023</p>
                        <p class="text-[#FF0000]">10.00 - 13.00</p>
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
        @endfor
    </div>


@endsection