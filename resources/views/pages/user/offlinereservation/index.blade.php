@extends('layouts.user.app')

@section('title', 'FarmCare - offline reservation')

@section('main-content')
<div class="mb-10 mt-5">
        <div class="container mx-auto text-center text-2xl bg-secondaryColor">
            <h2 class="pt-8 font-bold">Consult with a doctor at FarmCare+</h2>
            <p class="mt-4 mb-7">Telemedicine services are ready to help care for your livestock animals</p>
            <img src="{{ asset('images/assets/consultation-desc-image.svg') }}" alt="online consultation" class="mx-auto pb-7">
        </div>
    </div>
    <div class="container mx-auto px-4 mt-5" style="margin-top: 150px">
        <!-- Dropdown for Specialist -->
        <div class="mb-4">
            <form action="{{ route('user.reservation') }}" method="GET">
                <label for="specialist" class="block text-gray-700 text-sm font-bold mb-2">Choose Specialist</label>
                <select id="specialist" name="specialist" class="block w-full bg-gray-200 border border-gray-200 text-gray-800 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">Select Specialist</option>
                    <option value="Livestock">Livestock</option>
                    <option value="Aquaculture">Aquaculture</option>
                    <option value="Poultry">Poultry</option>
                    <option value="Nutrition">Nutrition</option>
                    <option value="Breeding">Breeding</option>
                    <option value="Dermatology">Dermatology</option>
                </select>
                <button type="submit" class="btn-base bg-shadeBrown text-white font-bold text-xs rounded py-2 px-5 hover:text-shadeBrown hover:bg-white hover:outline hover:outline-1 mt-2">Filter</button>
            </form>
        </div>
        <!-- End Dropdown for Specialist -->

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-4">
           @foreach ($veterinarians as $veterinarian)
                <a href="{{ url('/veterinarian/' . $veterinarian->id . '/schedule') }}"
                    class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                        src="{{ $veterinarian->photo }}">
                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $veterinarian->name }}
                        </h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $veterinarian->specialist }}</p>
                        <span class="text-red-500 text-lg ">+ more</span>
                        <p class="mb-2 text-2xl font-medium font-sm tracking-tight text-gray-900 dark:text-white mt-5">
                            Rp. {{ number_format($veterinarian->reservation_price, 0, '.', '') }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection

@if (session('success'))
    <x-alert-notification type="success" message="{{ session('success') }}" />
@endif