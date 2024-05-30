@extends('layouts.veterinarian.app')

@section('title' ,'Veterinarian - Online Consultation')

@section('main-content')
<h1 class="font-semibold text-2xl  px-14 mb-12">Veterinarian Profile</h1>

<div class="w-[1200px] container mx-auto  pb-20 mb-40 flex">
    <div class="w-1/3 text-center">
        <img class="w-[300px]  mask mask-circle border-4 border-shadeGray mx-auto mb-4" 
            src="{{ asset('storage/photo/veterinarian/' . $veterinarian->photo) }}" />
             <a href="#" class="text-shadeBrown font-semibold underline" onclick="toggleForm()">Change Photo</a>
        
        <div class="photo-button m-4">
            
        </div>
        
        <div class="photo-form hidden" id="file-dropzone">
            <form action="{{ route('veterinarian.profile.updatePhoto',['id'=>$veterinarian->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="w-4/5 rounded-md border border-shadeGray border-opacity-50 mt-8 px-4 py-6 mx-auto">
                    <label for="photo" class="font-medium text-xl text-center block mb-4">Change Photo</label>
                    <input id="photo" type="file" name="photo" class="file:rounded-lg file:mr-4 font-medium text-lg block mx-auto" required>
                    <label for="photo" class="font-medium text-lg text-center block mt-4">Drag and drop here or browse</label>
                    <button type="submit" class="btn  mt-4">Upload</button>
                </div>
                
            </form>
        </div>
    </div>
    <div class="w-2/3">
        <form action="{{ route('veterinarian.profile.edit.submit', $veterinarian->id) }}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="flex flex-wrap font-medium text-xl ">
                <div class="w-full mb-4">
                    <label class="font-medium text-2xl" for="name">Full Name <span class="text-red-600">*</span></label>
                    <input type="text" name="name" id="name" value="{{ $veterinarian->name }}" class="w-full my-3 rounded-lg border border-shadeGray border-opacity-50 text-lg p-4">
                </div>
                <div class="w-full mb-4">
                    <label class="font-medium text-2xl" for="specialist">Specialist</label>
                    <input type="text" name="specialist" id="specialist" value="{{ $veterinarian->specialist }}" class="w-full my-3 rounded-lg border border-shadeGray border-opacity-50 text-lg p-4">
                </div>
                <div class="w-full mb-4">
                    <label class="font-medium text-2xl" for="university">University</label>
                    <input type="text" name="university" id="university" value="{{ $veterinarian->university }}" class="w-full my-3 rounded-lg border border-shadeGray border-opacity-50 text-lg p-4">
                </div>
                <div class="w-full mb-4">
                    <label class="font-medium text-2xl" for="graduate_year">Graduate Year</label>
                    <input type="text" name="graduate_year" id="graduate_year" value="{{ $veterinarian->graduate_year }}" class="w-full my-3 rounded-lg border border-shadeGray border-opacity-50 text-lg p-4">
                </div>
                <div class="w-full mb-4">
                    <label class="font-medium text-2xl" for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ $veterinarian->email }}" class="w-full my-3 rounded-lg border border-shadeGray border-opacity-50 text-lg p-4">
                </div>
                <div class="w-full mb-4">
                    
                        <p class="mt-6 font-medium text-2xl">Certification of Doctor</p>
                       
                    
                    
                    
                        <div class="w-full rounded-md border border-shadeGray border-opacity-50 mt-3">
                            <input id="certification" type="file" name="certification" class="file:rounded-lg file:mr-4 ml-4 font-small text-l mt-5" >
                            <label for="certification" class="font-medium text-xl text-center block mt-5 mb-2">Drag and drop here or browse</label>
                        </div>
                   
                 </div>
                <div class="w-full mb-4">
                    <label class="font-medium text-2xl" for="consultation_price">Consultation Price</label>
                    <input type="text" name="consultation_price" id="consultation_price" value="{{ $veterinarian->consultation_price }}" class="w-full my-3 rounded-lg border border-shadeGray border-opacity-50 text-lg p-4">
                </div>
                <div class="w-full mb-4">
                    <label class="font-medium text-2xl" for="reservation_price">Reservation Price</label>
                    <input type="text" name="reservation_price" id="reservation_price" value="{{ $veterinarian->reservation_price }}" class="w-full my-3 rounded-lg border border-shadeGray border-opacity-50 text-lg p-4">
                </div>
            </div>
            <div class="flex justify-center mt-10">
                <a href="{{ route('veterinarian.profile') }}" class="btn h-14 w-28 rounded-md bg-gray-300 text-black font-bold text-base hover:bg-gray-400 mx-5">Cancel</a>
                <button type="submit" class="btn h-14 w-28 rounded-md bg-shadeBrown text-white font-bold text-base hover:text-shadeBrown hover:bg-white">Save</button>                
            </div>
        </form>
    </div>
</div>

@push('styles')
<style>
    .large-size {
        width: 300px; /* Set the fixed width */
        height: 300px; /* Set the fixed height */
        object-fit: cover; /* Ensures the image covers the entire box while maintaining aspect ratio */
    }

    .enhanced-border {
        border-color: #6b7280; /* Replace with your desired border color */
        border-width: 4px; /* Set the border thickness */
        border-style: solid; /* Ensure the border is solid */
    }

    .hidden {
        display: none;
    }
</style>
@endpush

@push('scripts')
<script>
    function toggleForm() {
        const photoForm = document.querySelector('.photo-form');
        photoForm.classList.toggle('hidden');
    }

    function toggleCertificationForm() {
    const certificationButton = document.querySelector('.certification-button');
    const certificationForm = document.querySelector('.certification-form');

    // Toggle visibility of certification form
    certificationButton.classList.toggle('hidden');
    certificationForm.classList.toggle('hidden');
}


    document.getElementById('file-dropzone').addEventListener('dragover', function(event) {
        event.preventDefault();
    });

    document.getElementById('file-dropzone').addEventListener('dragleave', function(event) {
        event.preventDefault();
    });

    document.getElementById('file-dropzone').addEventListener('drop', function(event) {
        event.preventDefault();
        const fileInput = this.querySelector('input[type="file"]');
        fileInput.files = event.dataTransfer.files;
    });
</script>
@endpush

@endsection
