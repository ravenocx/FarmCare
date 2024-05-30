    @extends('layouts.veterinarian.app')

    @section('title' ,'Veterinarian - Online Consultation')

    @section('main-content')
    <h1 class="font-semibold text-2xl  px-14 mb-12">Veterinarian Profile</h1>

    <div class="w-[1200px] container mx-auto  pb-20 mb-40 flex">
        <div class="w-1/3 text-center">
            <img class="w-[300px]  mask mask-circle border-4 border-shadeGray mx-auto mb-4" 
            src="{{ asset('storage/photo/veterinarian/' . $veterinarian->photo) }}" />
       </div>
        <div class="w-2/3">
            <div class="flex flex-wrap font-medium text-xl ">
                <div class="w-full">
                    <label class="font-medium text-2xl">Full Name <span class="text-red-600">*</span></label>
                    <p class="w-full my-3 rounded-lg border border-shadeGray border-opacity-50 text-lg p-4 ">
                        {{ $veterinarian->name }}</p>
                </div>
                <div class="w-full">
                    <label class="font-medium text-2xl">Specialist</label>
                    <p class="w-full my-3 rounded-lg border border-shadeGray border-opacity-50 text-lg p-4 ">
                        {{ $veterinarian->specialist }}</p>
                </div>
                <div class="w-full">
                    <label class="font-medium text-2xl">University</label>
                    <p class="w-full my-3 rounded-lg border border-shadeGray border-opacity-50 text-lg p-4 ">
                        {{ $veterinarian->university }}</p>
                </div>
                <div class="w-full">
                    <label class="font-medium text-2xl">Graduate Year</label>
                    <p class="w-full my-3 rounded-lg border border-shadeGray border-opacity-50 text-lg p-4 ">
                        {{ $veterinarian->graduate_year }}</p>
                </div>
                <div class="w-full">
                    <label class="font-medium text-2xl">Email</label>
                    <p class="w-full my-3 rounded-lg border border-shadeGray border-opacity-50 text-lg p-4 ">
                        {{ $veterinarian->email }}</p>
                </div>
                <div class="w-full mb-5">
                    <label class="font-medium text-2xl  ">Certification</label><p class="my-4"></p>
                    <a href="{{ asset('storage/certifications/' . $veterinarian->certification) }} "  target="_blank" ><u>Certification Link</u></a>
                </div>

                <div class="w-full">
                    <label class="font-medium text-2xl">Consultation Price</label>
                    <p class="w-full my-3 rounded-lg border border-shadeGray border-opacity-50 text-lg p-4 ">
                       Rp. {{ $veterinarian->consultation_price }}</p>
                </div>
                <div class="w-full">
                    <label class="font-medium text-2xl">Reservation Price</label>
                    <p class="w-full my-3 rounded-lg border border-shadeGray border-opacity-50 text-lg p-4 ">
                      Rp.  {{ $veterinarian->reservation_price }}</p>
                </div>
            </div>
            <div class="flex justify-center mt-10">
                <a href="{{ route('veterinarian.profile.edit') }}"
                    class="btn h-14 w-28 rounded-md bg-shadeBrown text-white font-bold text-base hover:text-shadeBrown hover:bg-white">Edit</a>
            </div>
        </div>
    </div>
    


    
    @push('styles')
    <style>
        .cow-image{
            /* margin-top:384px ; */
            padding-bottom:480px;
        }
        
    </style>
    @endpush

    @push('scripts')
        <script>
            function toggleForm() {
                const photoButton = document.querySelector('.photo-button');
                const photoForm = document.querySelector('.photo-form');
                const cowImage = document.getElementById('cow-image');

                photoButton.classList.toggle('hidden');
                photoForm.classList.toggle('hidden');

                const currentPadding = parseFloat(cowImage.style.paddingBottom || 480); // Default padding is 480px
                const newPadding = currentPadding + 80; // Add 120px

                // Set the new padding value
                cowImage.style.paddingBottom = newPadding + 'px';
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




