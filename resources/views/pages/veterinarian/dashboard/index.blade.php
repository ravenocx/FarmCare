@extends('layouts.veterinarian.app')

@section('title' ,'Veterinarian - Dashboard')

@section('main-content')

<section class="relative bg-primaryColor pb-14 pl-20 pt-24">
        <h1 class="font-semibold text-4xl mb-6">The Most Comprehensive Animal Health Solution</h1>
        <p class="text-xl mb-7">Chat with doctors with online consultations, visit hospitals with offline reservations and update <br> information Regarding your livestock health, you can do it all at FarmCare+</p>
        <div class="flex">
            <a href="{{route('user.consultation')}}">
                <div class="bg-white rounded-xl px-16 pt-2 pb-4 shadow-lg">
                    <img src="{{asset('images/icon/consultation-icon.svg')}}" class="mx-auto mb-3"/>
                    <p class="text-base font-medium text-center">Online Consultation</p>
                </div>
            </a>

            <a href="{{ url('veterinarian/offline-reservation') }}">
                <div class="bg-white rounded-xl px-16 pt-2 pb-4 shadow-lg ml-7">
                    <img src="{{asset('images/icon/reservation-icon.svg')}}" class="mx-auto mb-3 size-[200px]"/>
                    <p class="text-base font-medium text-center">Offline Consultation</p>
                </div>
            </a>
        </div>

        <img src="{{asset('images/animal/cow-homepage.svg')}}" alt="cow" class="absolute bottom-8 right-0 h-[340px] ">
    </section>

    <section class="container mx-auto w-[1149px] pb-16">
    <div class="container mx-auto mt-10 flex justify-center">
        <div class="box bg-white rounded-lg shadow-lg p-10 mx-6 w-64">
            <h2 class="text-lg font-semibold mb-4">Total Income</h2>
            <p class="text-xl font-bold">RP. {{$total_penjualan}}</p>
        </div>
        <div class="box bg-white rounded-lg shadow-lg p-10 mx-6 w-64">
            <h2 class="text-lg font-semibold mb-4">Total Patients</h2>
            <p class="text-xl font-bold">{{$total_pasien}}</p>
        </div>
        <div class="box bg-white rounded-lg shadow-lg p-10 mx-6 w-64">
            <h2 class="text-lg font-semibold mb-4">Ongoing Appointments</h2>
            <p class="text-xl font-bold">{{$total_appoinment}}</p>
        </div>
    </div>
    </section>



    
@endsection