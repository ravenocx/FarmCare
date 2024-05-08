@extends('layouts.user.app')

@section('title','FarmCare - Online Consultation')

@section('main-content')
    <div class="mb-10 mt-5">
        <div class="containet mx-auto text-center text-2xl bg-secondaryColor">
            <h2 class="pt-8 font-bold">Consult with a doctor at FarmCare+</h2>
            <p class="mt-4 mb-7">Telemedicine services are ready to help care for your <br>livestock animals</p>
            <img src="{{asset('images/assets/consultation-desc-image.svg')}}" alt="online consultation" class="mx-auto pb-7">
        </div>
    </div>
    

    <div class="flex">
        <div class="pl-24 pr-10 pt-11 border-y-2 pb-16">
            <p class="text-xl font-medium">Why consult a doctor at FarmCare+?</p>
            <ol class="list-decimal text-base max-w-[393px]">
                <li>Online consultations can be done anytime and anywhere</li>
                <li>Online consultations are generally cheaper than in-person consultations at a veterinarian</li>
                <li>Online consultations allow farmers to get information and advice on animal health from experienced and qualified veterinarians</li>
                <li>Online consultations help farmers feel more comfortable and relaxed when discussing their livestock health problems</li>
            </ol>
        </div>

        <div class="flex-grow border-l-2 pl-12 pt-6 border-y-2 pb-16">
            <p class="font-bold text-2xl">Doctor Recommendation</p>
            <p class="font-medium text-base mt-2 mb-4">Consult with our best doctors</p>
            
            <div class="flex justify-center">
                @foreach($veterinariansRecommendation as $index => $veterinarian)
                    <div class="{{ $index === 0 ? 'border-r-2 border-shadeCream pr-6' : 'px-6' }}  py-5">
                        <x-consultcard
                            doctorImage="{{$veterinarian->photo ? $veterinarian->photo :'images/icon/doctor-icon.png'}}" 
                            alt="{{$veterinarian->gender === 'male' ? 'Dr.' . $veterinarian->name : 'Dra.' . $veterinarian->name }}" 
                            name="{{$veterinarian->gender === 'male' ? 'Dr.' . $veterinarian->name : 'Dra.' . $veterinarian->name}}" 
                            specialist="{{$veterinarian->specialist}}" 
                            experience="{{2024 - ($veterinarian -> graduate_year)}} Tahun"
                            price="Rp {{number_format($veterinarian->consultation_price, 0, ',', '.')}}"
                        />
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    @foreach($veterinariansBySpecialist as $specialist => $veterinarians)
    <div class="container mx-auto w-[1255.28px] {{$specialist === 'Livestock' ?'mt-10' : 'mt-8'}} {{$specialist === 'Dermatology' ?'mb-20' : ' '}} ">
        @if($specialist === 'Livestock')
        <div class="relative">
            <input class="w-[1255.28px] h-[74px] pl-11 py-5 border border-gray-300 rounded-lg" type="text" name="doctor_search" id="doctor_search" placeholder="Search for a doctor or specialty">
                <div class="absolute inset-y-0 right-0 mr-11 flex items-center pointer-events-none">
                    <img src="{{asset('images/vector/search-vector.svg')}}" alt="Search Icon">
                </div>
        </div>
        @endif
        <div class="border-b-2 border-shadeCream">
            <div class="flex justify-between {{$specialist === 'Livestock' ?'mt-14' : ''}} mb-5">
                <p class="text-xl font-semibold">{{$specialist}} Speciality</p>
                <button class="text-lg font-semibold text-shadeBrown">View All ></button>
            </div>

            <div class="flex justify-center pb-3">
                @foreach($veterinarians as $index => $veterinarian)
                <div class="{{$index === 2 ? '' : 'border-r-2'}} {{$index === 0 ? 'pr-6' : ($index === 1 ? 'px-6' : 'pl-6')}} border-shadeCream py-5">
                    <x-consultcard
                        doctorImage="{{$veterinarian->photo ? $veterinarian->photo :'images/icon/doctor-icon.png'}}" 
                        alt="{{$veterinarian->gender === 'male' ? 'Dr.' . $veterinarian->name : 'Dra.' . $veterinarian->name }}" 
                        name="{{$veterinarian->gender === 'male' ? 'Dr.' . $veterinarian->name : 'Dra.' . $veterinarian->name}}" 
                        specialist="{{$veterinarian->specialist}}" 
                        experience="{{2024 - ($veterinarian -> graduate_year)}} Tahun"
                        price="Rp {{number_format($veterinarian->consultation_price, 0, ',', '.')}}"
                    />
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach

    
@endsection