@extends('layouts.user.app')

@section('title', 'Veterinarian Detail')

@section('main-content')
    <div class="flex justify-center mt-6 mb-10 ">
        <div>
            <h1 class="font-semibold text-2xl text-center mb-10 divider">Veterinarian Details</h1>
            <div class="border-shadeCream border-2 rounded-lg mb-6">
                <div class="mx-20 mt-4">
                    <div class="px-4">
                        <img src="{{asset($veterinarian->photo ? $veterinarian->photo :'images/icon/doctor-icon.png')}}" alt="doctor-img" class="w-56 h-64 rounded-lg border border-shadeCream mx-auto">
                    </div>
                    <div class="py-3 border-y border-[#C8B6A6] mt-3 mb-5">
                        <p class="font-semibold text-base ">{{$veterinarian->gender === 'male' ? 'Dr.' . $veterinarian->name : 'Dra.' . $veterinarian->name}}</p>
                        <p class="text-mediumGray my-1 text-xs">{{$veterinarian->specialist}} Specialist</p>
            
                        <div class="flex mt-2 items-center">
                            <img src="{{asset('images/vector/doctor-bag.svg')}}" alt="years of experience" class="h-4">
                            <p class="font-semibold text-xs text-[#A4907C] ml-1 ">{{2024 - ($veterinarian -> graduate_year)}} Tahun</p>
                        </div>
            
                        <p class="font-semibold mt-2">Rp {{number_format($veterinarian->consultation_price, 0, ',', '.')}}</p>
                    </div>
    
                    <div class="flex mb-3">
                        <img src="{{asset('images/vector/alumnus-vector.svg')}}" class="h-[30px]">
                        <div class="ml-5">
                            <p class="font-semibold text-xs mb-1">Alumnus</p>
                            <p class="text-mediumGray text-xs">{{$veterinarian -> university}}, {{$veterinarian -> graduate_year}}</p>
                        </div>
                    </div>
    
                    <div class="flex mb-5">
                        <img src="{{asset('images/vector/strnumber-vector.svg')}}" class="">
                        <div class="ml-5">
                            <p class="font-semibold text-xs mb-2">STR Number</p>
                            <p class="text-mediumGray text-xs">{{$veterinarian -> str_number}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <a href="">
                <button class="btn-base w-full mt-auto bg-shadeBrown font-bold text-base text-white rounded py-2 px-5 hover:text-shadeBrown hover:bg-white hover:border">Chat</button>
            </a>
        </div>
        
    </div>
@endsection