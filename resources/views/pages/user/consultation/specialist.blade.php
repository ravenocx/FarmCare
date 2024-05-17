@extends('layouts.user.app')

@section('title' , 'Consultation - Specialist')

@section('main-content')
    <div class="mb-10 mt-5">
        <div class="containet mx-auto text-center text-2xl bg-secondaryColor">
            <h2 class="pt-8 font-bold">Consult with a doctor at FarmCare+</h2>
            <p class="mt-4 mb-7">Telemedicine services are ready to help care for your <br>livestock animals</p>
            <img src="{{asset('images/assets/consultation-desc-image.svg')}}" alt="online consultation" class="mx-auto pb-7">
        </div>
    </div>
    

    <div class="container mx-auto w-[1255.28px] mt-10 mb-10 ">
        <div class="relative">
            <input class="w-[1255.28px] h-[74px] pl-11 py-5 border border-gray-300 rounded-lg" type="text" name="doctor_search" id="doctor_search" placeholder="Search for a doctor or specialty">
                <div class="absolute inset-y-0 right-0 mr-11 flex items-center pointer-events-none">
                    <img src="{{asset('images/vector/search-vector.svg')}}" alt="Search Icon">
                </div>
        </div>
        <p class="text-xl font-semibold mt-14 mb-2">{{$specialist}} Speciality</p>

        <div class="grid grid-cols-3">
            @foreach($veterinarians as $index => $veterinarian)
            <div class="border-b-2 border-shadeCream pb-3 pt-3">
                <div class="{{($index + 1) % 3 == 0 ? '' : 'border-r-2'}} {{($index + 1) % 3 == 0 ? 'pl-6' : ($index % 3 == 0 ? 'pr-6' : 'px-6')}} border-shadeCream py-5">
                <div class="flex">
                        <img src="{{asset($veterinarian->photo ? $veterinarian->photo :'images/icon/doctor-icon.png')}}" alt="{{$veterinarian->gender === 'male' ? 'Dr.' . $veterinarian->name : 'Dra.' . $veterinarian->name }}" class="card-image size-44 border-shadeBrown border-2 rounded-md">

                        <div class="w-[189.09px] h-[176px] text-left ml-5 text-xs flex flex-col">
                            <div class="flex-grow">
                                <p class="font-semibold text-sm ">{{$veterinarian->gender === 'male' ? 'Dr.' . $veterinarian->name : 'Dra.' . $veterinarian->name}}</p>
                                <p class="text-mediumGray my-1">{{$veterinarian->specialist}}</p>
                                <a class="text-[#FF0000]" href="{{route('user.consultation.veterinarian', ['id' => ($veterinarian -> id)]) }}">+more</a>
                        
                                <div class="flex mt-2 items-center">
                                    <img src="{{asset('images/vector/doctor-bag.svg')}}" alt="years of experience" class="h-4">
                                    <p class="font-semibold text-xs text-[#A4907C] ml-1 ">{{2024 - ($veterinarian -> graduate_year)}} Tahun</p>
                                </div>
                        
                                <p class="font-medium mt-2">Rp {{number_format($veterinarian->consultation_price, 0, ',', '.')}}</p>
                            </div>
                            
                            @if ($veterinarian->serviceSchedules->isEmpty())
                                <button class="btn-sm w-20 mt-auto bg-gray-300 text-xs text-white rounded py-2 px-5 cursor-not-allowed">Offline</button>
                            @else
                                <a href="{{ route('user.consultation.veterinarian', ['id' => $veterinarian->id]) }}">
                                    <button class="btn-sm w-20 mt-auto bg-shadeBrown font-bold text-xs text-white rounded py-2 px-5 hover:text-shadeBrown hover:bg-white hover:border">Chat</button>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-10">
            <!-- {{$veterinarians->links()}} -->
            {{ $veterinarians->links('vendor.pagination.tailwind') }}
        </div>
    </div>

@endsection