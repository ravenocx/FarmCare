@extends('layouts.admin.app')

@section('title', 'Admin - Veterinarian Management')

@section('main-content')
    <div class="flex justify-between pt-32 px-14 mb-12">
        <h1 class="font-semibold text-2xl">List of Veterinarians</h1>
        <a href="{{route('admin.management.veterinarian')}}" class="font-semibold text-shadeBrown text-base"> View All ></a>
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

    <div class="container mx-auto border-b-2 border-primaryColor mb-16"></div>

    <div class="flex justify-between px-14 mb-12">
        <h1 class="font-semibold text-2xl">List of Applicant</h1>
        <a href="{{route('admin.management.applicant')}}" class="font-semibold text-shadeBrown text-base"> View All ></a>
    </div>

    

    <div class="container mx-auto relative overflow-x-auto overflow-y-auto max-h-[640px] shadow-md sm:rounded-lg mb-20">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-md text-white bg-shadeBrown sticky top-0">
                <tr class="text-center">
                    <th scope="col" class="p-4">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Specialist
                    </th>
                    <th scope="col" class="px-6 py-3">
                        University
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Graduate Year
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Certification
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="text-center">
                @for ($i = 0; $i < 10; $i++)
                <tr class="odd:bg-white even:bg-gray-100 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        {{$i+1}}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        drh. Sofwan Abdul Fatah
                    </th>
                    <td class="px-6 py-4">
                        Livestock Specialist
                    </td>
                    <td class="px-6 py-4">
                        Telkom University
                    </td>
                    <td class="px-6 py-4">
                        2007
                    </td>
                    <td class="px-6 py-4">
                        sopwan@gmail.com
                    </td>
                    <td class="px-6 py-4">
                        <a href=""><u>Certification Link</u></a>
                    </td>
                    <td class="flex justify-center items-center px-6 py-4">
                        <a href="#" class="font-medium text-green-600 dark:text-blue-500 hover:underline">Approve</a>
                        <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Reject</a>
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
    @if (session('success'))
        <x-popup-notification message="{{session('success')}}" />
    @endif

@endsection