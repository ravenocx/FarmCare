@extends('layouts.login-regist.master')

@section('title','FarmCare - Sign Up as a Veterinarian')

@section('main-content')
    <div class="flex flex-col h-screen">
        <div class="flex text-2xl font-bold">
            <a href="{{route('login.form')}}" class="w-1/2 flex justify-center items-center h-24">Sign In</a>
            <a href="" class="w-1/2 text-primaryColor border-b-2 border-primaryColor flex justify-center items-center h-24">Sign Up</a>
        </div>

        <div id="registerForm" class="register">
            <div class="mt-10 flex justify-center">
                <form id="register" action="register.php" method="post" class="flex flex-col">
                    @csrf

                    <label for="fullName" class="font-medium text-2xl">Full Name <span class="text-red-600">*</span></label>
                    <input id="fullName" type="text" name="fullName" placeholder="Enter your name" class="w-[677px] mt-3 h-20 rounded-lg border border-shadeGray border-opacity-50 text-lg px-4" autofocus required >

                    <!-- TODO : Change to Dropdown in specialist -->
                    <label for="specialist" class="font-medium text-2xl mt-6">Specialist <span class="text-red-600">*</span></label>
                    <select id="specialist" name="specialist" class="select select-bordered mt-3 h-20 rounded-lg border border-shadeGray border-opacity-50 text-lg px-4">
                        <option disabled selected>Select your specialist</option>
                        <option value="mastercard">Livestock Specialist</option>
                        <option value="aquaculture">Aquaculture Specialist</option>
                        <option value="poultry">Poultry Specialist</option>
                        <option value="nutrition">Nutrition and Vitamin Specialist</option>
                        <option value="breeding">Breeding Specialist</option>
                        <option value="dermatology">Dermatology Specialist</option>
                    </select>

                    <label for="university" class="font-medium text-2xl mt-6">University <span class="text-red-600">*</span></label>
                    <input id="university" type="text" name="university" placeholder="Enter your University" class="w-[677px] mt-3 h-20 rounded-lg border border-shadeGray border-opacity-50 text-lg px-4" autofocus required >

                    <label for="graduateYear" class="font-medium text-2xl mt-6">Graduate Year <span class="text-red-600">*</span></label>
                    <input id="graduateYear" type="number" name="graduateYear" placeholder="Enter your Graduate Year" class="w-[677px] mt-3 h-20 rounded-lg border border-shadeGray border-opacity-50 text-lg px-4" autofocus required >


                    <label for="email" class="font-medium text-2xl mt-6">Email <span class="text-red-600">*</span></label>
                    <input id="email" type="email" name="email" placeholder="Enter your email" class="w-[677px] mt-3 h-20 rounded-lg border border-shadeGray border-opacity-50 text-lg px-4" autofocus required>

                    <div class="flex w-[677px] mt-6">
                        <div class="max-w-80">
                            <label for="password" class="font-medium text-2xl">Password <span class="text-red-600">*</span></label>
                            <input id="password" type="password" name="password" placeholder="Enter your password" class="w-80 mt-3 h-20 rounded-lg border border-shadeGray border-opacity-50 text-lg px-4" autofocus required>
                        </div>

                        <div class="max-w-80 ml-[37px]">
                            <label for="password_confirmation" class="font-medium text-2xl">Confirm Password <span class="text-red-600">*</span></label>
                            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Retype your password" class="w-80 mt-3 h-20 rounded-lg border border-shadeGray border-opacity-50 text-lg px-4" autofocus required>
                        </div>
                    </div>


                    <div class="certification-button">
                        <p class="mt-6 font-medium text-2xl">Certification of Doctor</p>
                        <div class="w-[677px] rounded-md border border-shadeGray border-opacity-50 mt-3">
                            <button onclick="toggleForm()">
                                <div class="flex items-center p-6">
                                    <img src="{{asset('images/icon/certification-file.svg')}}" alt="certification">
                                    <p class="ml-4 font-medium text-2xl">Certification Of Specialist</p>
                                </div>
                            </button>
                        </div>
                    </div>
                    
                    <div class="certification-form hidden" id="file-dropzone">
                        <div class="w-[677px] rounded-md border border-shadeGray border-opacity-50 mt-8">
                            <label for="certification" class="font-medium text-2xl text-center block my-5">Certification of Doctor</label>
                            <input id="certification" type="file" name="certification" class="file:rounded-lg file:mr-4 ml-4 font-medium text-2xl" required>
                            <label for="certification" class="font-medium text-xl text-center block mt-5 mb-2">Drag and drop here or browse</label>
                        </div>
                    </div>

                    <button type="submit" class="w-[677px] rounded-md mt-20 bg-primaryColor text-white font-bold text-2xl py-3.5">Sign Up</button>
                </form>
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
                const certificationButton = document.querySelector('.certification-button');
                const certificationForm = document.querySelector('.certification-form');
                const cowImage = document.getElementById('cow-image');

                certificationButton.classList.toggle('hidden');
                certificationForm.classList.toggle('hidden');

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



