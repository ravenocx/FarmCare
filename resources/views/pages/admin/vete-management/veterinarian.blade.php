@extends('layouts.admin.app')

@section('title', 'Admin - Veterinarian List')

@section('main-content')
   
    <div class="flex justify-between pt-32 px-14 mb-12">
    <h1 class="font-semibold text-2xl">List of Veterinarians</h1>
        <form action="{{ route('admin.management.veterinarian') }}" method="GET" >
        <input type="text" name="query" placeholder="Search veterinarians" class="border border-gray-300 px-4 py-2 rounded-md mr-2">
        <button type="submit" class="btn px-4 py-2 bg-primaryColor text-white font-medium hover:text-primaryColor hover:bg-white">Search</button>
    </form>
    </div>
    
    <div class="flex flex-wrap justify-center mb-20">
        @foreach ($veterinariansByAccepted as $index => $veterinarian)
            @if ($index % 3 === 0)
                @if ($index > 0)
                    </div> <!-- Close previous row -->
                @endif
                <div class="flex justify-center w-full mb-6"> <!-- Start a new row -->
            @endif
            
            <div class="bg-secondaryColor rounded-lg shadow-2xl mr-14 w-[400px] mb-6">
                @if( $veterinarian->photo)
                <img class="w-1/2 h-48 mask mask-circle mx-auto mt-6 mb-6" src="{{ asset('storage/photo/veterinarian/' . $veterinarian->photo) }}"/>
            @else
                <img class="w-1/2 h-48 mask mask-circle mx-auto mt-6 mb-6" src="{{asset('images/icon/doctor-profile-icon.svg')}}" alt="profile-image">
            @endif
                
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

    <div class="flex justify-center mt-6">
        {{ $veterinariansByAccepted->links() }}
    </div>
@endsection
