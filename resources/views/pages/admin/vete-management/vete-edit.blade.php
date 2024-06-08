@extends('layouts.admin.app')

@section('title', 'Admin - Veterinarian Management')

@section('main-content')
    <h1 class="font-semibold text-2xl pt-32 px-14 mb-12">Edit Veterinarian Profile</h1>

    <div class="w-[1200px] container mx-auto border-2 pb-20 mb-40">
        <img class="mask mask-circle mx-auto mt-4 mb-20" src="{{asset('images/assets/doctor-list.svg')}}"/>
        <div class="flex flex-wrap font-medium text-xl px-40">
            <div class="w-1/2">
                <div>
                    <label for="">Full Name</label>
                    <br>
                    <input type="text" class="w-96 rounded-md border-gray-200 my-4" value="test" readonly>
                </div>
                <div>
                    <label for="">Specialist</label>
                    <br>
                    <input type="text" class="w-96 rounded-md border-gray-200 my-4">
                </div>
            </div>
            <div class="w-1/2">
                <div class ="ml-20">
                    <label for="">University</label>
                    <br>
                    <input type="text" class="w-96 rounded-md border-gray-200 my-4">
                </div>
                <div class ="ml-20">
                    <label for="">Graduate Year</label>
                    <br>
                    <input type="text" class="w-96 rounded-md border-gray-200 my-4">
                </div>
            </div>
            <div class="w-1/2">
                <div>
                    <label for="">Email</label>
                    <br>
                    <input type="text" class="w-96 rounded-md border-gray-200 my-4">
                </div>
                <div>
                    <label for="">Certification</label>
                    <br>
                    <input type="text" class="w-96 rounded-md border-gray-200 my-4">
                </div>
            </div>
            <div class="w-1/2">
                <div class ="ml-20">
                    <label for="">Consultation Price</label>
                    <br>
                    <input type="text" class="w-96 rounded-md border-gray-200 my-4">
                </div>
                <div class ="ml-20">
                    <label for="">Reservation Price</label>
                    <br>
                    <input type="text" class="w-96 rounded-md border-gray-200 my-4">
                </div>
            </div>
        </div>

        <div class="flex justify-center mt-10">
            <button type="submit" class="btn h-14 w-28 rounded-md bg-shadeBrown text-white font-bold text-base hover:text-shadeBrown hover:bg-white">Submit</button>
        </div>



    </div>


    

@endsection