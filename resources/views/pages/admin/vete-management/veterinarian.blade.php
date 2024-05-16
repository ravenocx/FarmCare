@extends('layouts.admin.app')

@section('title', 'Admin - Veterinarian List')

@section('main-content')
    <h1 class="font-semibold text-2xl pt-32 px-14 mb-12">List of Veterinarians</h1>

    <div class="flex flex-wrap justify-center mb-20">
        @foreach ($veterinariansByAccepted as $index => $veterinarian)
            @if ($index % 3 === 0)
                @if ($index > 0)
                    </div> <!-- Close previous row -->
                @endif
                <div class="flex justify-center w-full mb-6"> <!-- Start a new row -->
            @endif
            
            <div class="bg-secondaryColor rounded-lg shadow-2xl mr-14 w-[400px] mb-6">
                <img class="mask mask-circle mx-auto pt-4 mb-6" src="{{ $veterinarian->photo }}"/>
                <p class="font-semibold text-base text-center mb-3"> {{ $veterinarian->name }}</p>
                <div class="flex items-center justify-center mb-6">
                    <img src="{{asset('images/icon/specialist-icon.svg')}}" class="size-6">
                    <p class="text-base pb-1"> {{ $veterinarian->specialist }}</p>
                </div>

                <div class="bg-primaryColor w-20 rounded-md ml-6 mb-5"> 
                    <a href="{{ route('admin.management.veterinarian.detail', ['id' => $veterinarian->id]) }}" class="font-medium text-center text-white py-1 px-3 text-sm">Details</a>
                </div>

                <div class="ml-6 text-sm pb-9">
                    <p class="mb-2">Email <span class="ml-[68px]">:  {{ $veterinarian->email }}<span></p>
                    <p class="mb-2">University<span class="ml-[43px]">:  {{ $veterinarian->university }}</span></p>
                    <p class="mb-14">Graduate Year <span class="ml-1">: {{ $veterinarian->graduate_year }}</span></p>
                    <a href="{{ route('admin.management.veterinarian.edit', ['id' => $veterinarian->id]) }}" class="mr-12">
                        <button class="btn px-11 py-2 rounded-xl bg-primaryColor text-white font-medium hover:text-primaryColor hover:bg-white">Edit profile</button>
                    </a>
                    <a href="">
                        <button class="btn px-11 py-2 rounded-xl bg-primaryColor text-white font-medium hover:text-primaryColor hover:bg-white">Delete</button>
                    </a>
                </div>
            </div>
        @endforeach
        
    </div>
@endsection
