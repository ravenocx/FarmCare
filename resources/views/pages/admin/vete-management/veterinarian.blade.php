@extends('layouts.admin.app')

@section('title', 'Admin - Veterinarian List')

@section('main-content')
    <h1 class="font-semibold text-2xl pt-32 px-14 mb-12">List of Veterinarians</h1>

    
    <div class="flex justify-center mb-20">
        @for ($i = 0; $i < 3; $i++)
        <div class="bg-secondaryColor rounded-lg shadow-2xl mr-14 w-[400px]">
            <img class="mask mask-circle mx-auto pt-4 mb-6" src="{{asset('images/assets/doctor-list.svg')}}"/>
            <p class="font-semibold text-base text-center mb-3">drh. Putri Nadia Sopiana</p>
            <div class="flex items-center justify-center mb-6">
                <img src="{{asset('images/icon/specialist-icon.svg')}}" class="size-6">
                <p class="text-base pb-1">Livestock Specialist</p>
            </div>
            
            <div class="bg-primaryColor w-20 rounded-md ml-6 mb-5"> 
                <p class="font-medium text-center text-white py-1 text-sm">Details</p>
            </div>

            <div class="ml-6 text-sm pb-9">
                <p class="mb-2">Email <span class="ml-[68px]">: putrinadia@gmail.com<span></p>
                <p class="mb-2">University<span class="ml-[43px]">: Telkom University</span></p>
                <p class="mb-14">Graduate Year <span class="ml-1">: 2008</span></p>
                <a href="" class="mr-12">
                    <button class="btn px-11 py-2 rounded-xl bg-primaryColor text-white font-medium hover:text-primaryColor hover:bg-white">Edit profile</button>
                </a>
                <a href="">
                    <button class="btn px-11 py-2 rounded-xl bg-primaryColor text-white font-medium hover:text-primaryColor hover:bg-white">Delete</button>
                </a>
            </div>
        </div>
        @endfor
    </div>

    <div class="flex justify-center mb-20">
        @for ($i = 0; $i < 3; $i++)
        <div class="bg-secondaryColor rounded-lg shadow-2xl mr-14 w-[400px]">
            <img class="mask mask-circle mx-auto pt-4 mb-6" src="{{asset('images/assets/doctor-list.svg')}}"/>
            <p class="font-semibold text-base text-center mb-3">drh. Putri Nadia Sopiana</p>
            <div class="flex items-center justify-center mb-6">
                <img src="{{asset('images/icon/specialist-icon.svg')}}" class="size-6">
                <p class="text-base pb-1">Livestock Specialist</p>
            </div>
            
            <div class="bg-primaryColor w-20 rounded-md ml-6 mb-5"> 
                <p class="font-medium text-center text-white py-1 text-sm">Details</p>
            </div>

            <div class="ml-6 text-sm pb-9">
                <p class="mb-2">Email <span class="ml-[68px]">: putrinadia@gmail.com<span></p>
                <p class="mb-2">University<span class="ml-[43px]">: Telkom University</span></p>
                <p class="mb-14">Graduate Year <span class="ml-1">: 2008</span></p>
                <a href="" class="mr-12">
                    <button class="btn px-11 py-2 rounded-xl bg-primaryColor text-white font-medium hover:text-primaryColor hover:bg-white">Edit profile</button>
                </a>
                <a href="">
                    <button class="btn px-11 py-2 rounded-xl bg-primaryColor text-white font-medium hover:text-primaryColor hover:bg-white">Delete</button>
                </a>
            </div>
        </div>
        @endfor
    </div>
@endsection