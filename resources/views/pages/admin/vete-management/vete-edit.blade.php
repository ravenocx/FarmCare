@extends('layouts.admin.app')

@section('title', 'Admin - Veterinarian Management')

@section('main-content')
    <h1 class="font-semibold text-2xl pt-32 px-14 mb-12">Edit Veterinarian Profile</h1>

    <div class="w-[1200px] container mx-auto border-2 pb-20 mb-40">
      
        <form method="POST" action="{{ route('admin.management.veterinarian.update',  ['id' => $veterinarian->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <img class="mask mask-circle mx-auto mt-4 mb-20" src="{{ asset('storage/photo/veterinarian/' . $veterinarian->photo) }}"/>
            <div class="flex flex-wrap font-medium text-xl px-40">
            <div class="w-full mb-6">
                    <label for="photo">Photo</label>
                    <br>
                    <input type="file" id="photo" name="photo" class="w-full rounded-md border-gray-200 my-4" accept="image/png, image/jpg, image/jpeg">
                    @error('photo')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-1/2">
                    <div>
                        <label for="name">Full Name</label>
                        <br>
                        <input type="text" id="name" name="name" class="w-96 rounded-md border-gray-200 my-4" value="{{ $veterinarian->name }}" >
                    </div>
                    <div>
                        <label for="specialist">Specialist</label>
                        <br>
                        <input type="text" id="specialist" name="specialist" class="w-96 rounded-md border-gray-200 my-4" value="{{ $veterinarian->specialist }}">
                    </div>
                </div>
                <div class="w-1/2">
                    <div class="ml-20">
                        <label for="university">University</label>
                        <br>
                        <input type="text" id="university" name="university" class="w-96 rounded-md border-gray-200 my-4" value="{{ $veterinarian->university }}">
                    </div>
                    <div class="ml-20">
                        <label for="graduate_year">Graduate Year</label>
                        <br>
                        <input type="text" id="graduate_year" name="graduate_year" class="w-96 rounded-md border-gray-200 my-4" value="{{ $veterinarian->graduate_year }}">
                    </div>
                </div>
                <div class="w-1/2">
                    <div>
                        <label for="email">Email</label>
                        <br>
                        <input type="email" id="email" name="email" class="w-96 rounded-md border-gray-200 my-4" value="{{ $veterinarian->email }}">
                    </div>
                    <div>
                        <label for="certification">Certification</label>
                        <br>
                        <input type="text" id="certification" name="certification" class="w-96 rounded-md border-gray-200 my-4" value="{{ $veterinarian->certification }}">
                    </div>
                </div>
                <div class="w-1/2">
                    <div class="ml-20">
                        <label for="consultation_price">Consultation Price</label>
                        <br>
                        <input type="text" id="consultation_price" name="consultation_price" class="w-96 rounded-md border-gray-200 my-4" value="{{ $veterinarian->consultation_price }}">
                    </div>
                    <div class="ml-20">
                        <label for="reservation_price">Reservation Price</label>
                        <br>
                        <input type="text" id="reservation_price" name="reservation_price" class="w-96 rounded-md border-gray-200 my-4" value="{{ $veterinarian->reservation_price }}">
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-10">
                <button type="submit" class="btn h-14 w-28 rounded-md bg-shadeBrown text-white font-bold text-base hover:text-shadeBrown hover:bg-white">Submit</button>
            </div>
        </form>
    </div>
@endsection
