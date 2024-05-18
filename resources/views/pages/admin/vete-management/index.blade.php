@extends('layouts.admin.app')

@section('title', 'Admin - Veterinarian Management')

@section('main-content')
    <div class="flex justify-between pt-32 px-14 mb-12">
        <h1 class="font-semibold text-2xl">List of Veterinarians</h1>
        <a href="{{route('admin.management.veterinarian')}}" class="font-semibold text-shadeBrown text-base"> View All ></a>
    </div>

    <div class="flex flex-wrap justify-center mb-20">
        @foreach ($veterinarians as $index => $veterinarian)
            @if ($index % 3 === 0)
                @if ($index > 0)
                    </div> <!-- Close previous row -->
                @endif
                <div class="flex justify-center w-full mb-6"> <!-- Start a new row -->
            @endif
            <div class="bg-secondaryColor rounded-lg shadow-2xl mr-14 w-[400px] mb-6">
                <img class="mask mask-circle mx-auto pt-4 mb-6" src="{{ asset('storage/photo/veterinarian/' . $veterinarian->photo) }}"/>
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
                    <form action="{{ route('admin.management.veterinarian.delete', ['id' => $veterinarian->id]) }}" method="POST" class="inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn px-11 py-2 rounded-xl bg-primaryColor text-white font-medium hover:text-primaryColor hover:bg-white">Delete</button>
</form>
                </div>
            </div>
        @endforeach
        
    </div>

    <div class="container mx-auto border-b-2 border-primaryColor mb-16">

    </div>
    
    </div>

    <div class="container mx-auto relative overflow-x-auto overflow-y-auto max-h-[640px] shadow-md sm:rounded-lg mb-20">
    <div class="flex justify-between px-14 mb-12">
        <h1 class="font-semibold text-2xl">List of Applicant</h1>
        <a href="{{route('admin.management.applicant')}}" class="font-semibold text-shadeBrown text-base"> View All ></a>
    </div>
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
            <!-- <tbody class="text-center">
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
            </tbody> -->
            <tbody class="bg-white divide-y divide-gray-200">
                @if ($veterinarians->isEmpty())
                    <tr>
                        <td class=" text-center mx-auto py-20" colspan="8">
                            <img class="w-32 h-32 mx-auto"
                                src="https://res.cloudinary.com/daqsjyrgg/image/upload/v1690261234/di7tvpnzsesyo7vvsrq4.svg"
                                alt="image empty states">
                            <p class="text-gray-700 font-medium text-lg text-center">No request data available.</p>
                            <p class="text-gray-500 text-center">Please wait for upcoming request</p>
                        </td>
                    </tr>
                @else
                    @foreach ($veterinarians as $index => $veterinarian)
                        <tr
                            class="odd:bg-white even:bg-gray-100 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                {{ $index + 1 }}
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $veterinarian->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $veterinarian->specialist }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $veterinarian->university }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $veterinarian->graduate_year }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $veterinarian->email }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ $veterinarian->certification_link }}"><u>Certification Link</u></a>
                            </td>
                            <td class="flex justify-center items-center px-6 py-4">
                              
                                    <span class="text-green-600 dark:text-blue-500">Accepted</span>
                               
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    
@endsection