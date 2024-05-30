@extends('layouts.admin.app')

@section('title', 'Admin - Veterinarian Management')

@section('main-content')
    <h1 class="font-semibold text-2xl pt-32 px-14 mb-12">Veterinarian Profile</h1>

    <div class="w-[1200px] container mx-auto border-2 pb-20 mb-40">
        <img class="w-[300px] mask mask-circle mx-auto mt-4 mb-10" src="{{ asset('storage/photo/veterinarian/' . $veterinarian->photo) }}"/>

        <div class="flex flex-wrap font-medium text-xl px-40">
            <div class="w-1/2">
                <div>
                    <label>Full Name</label>
                    <p class="w-96 rounded-md border-gray-200 my-4">{{ $veterinarian->name }}</p>
                </div>
                <div>
                    <label>Specialist</label>
                    <p class="w-96 rounded-md border-gray-200 my-4">{{ $veterinarian->specialist }}</p>
                </div>
            </div>
            <div class="w-1/2">
                <div class="ml-20">
                    <label>University</label>
                    <p class="w-96 rounded-md border-gray-200 my-4">{{ $veterinarian->university }}</p>
                </div>
                <div class="ml-20">
                    <label>Graduate Year</label>
                    <p class="w-96 rounded-md border-gray-200 my-4">{{ $veterinarian->graduate_year }}</p>
                </div>
            </div>
            <div class="w-1/2">
                <div>
                    <label>Email</label>
                    <p class="w-96 rounded-md border-gray-200 my-4">{{ $veterinarian->email }}</p>
                </div>
                <div>
                    <label>Certification</label><br>
                    <a href="{{ asset('storage/certifications/' . $veterinarian->certification) }}"><u>Certification Link</u></a>
                </div>
            </div>
            <div class="w-1/2">
                <div class="ml-20">
                    <label>Consultation Price</label>
                    <p class="w-96 rounded-md border-gray-200 my-4">{{ $veterinarian->consultation_price }}</p>
                </div>
                <div class="ml-20">
                    <label>Reservation Price</label>
                    <p class="w-96 rounded-md border-gray-200 my-4">{{ $veterinarian->reservation_price }}</p>
                </div>
            </div>
        </div>

        <div class="flex justify-center mt-10">
            <a href="{{ route('admin.management.veterinarian.edit', $veterinarian->id) }}" class="btn h-14 w-28 rounded-md bg-shadeBrown text-white font-bold text-base hover:text-shadeBrown hover:bg-white">Edit</a>
        </div>
    </div>
@endsection
