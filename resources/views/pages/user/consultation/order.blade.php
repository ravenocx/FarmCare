@extends('layouts.user.app')

@section('title' , 'Order Online Consultation')

@section('main-content')
    @foreach($veterinarians as $veterinarian)
    <div class="flex justify-center mt-20">
        <div class="border-shadeCream border-2 rounded-lg h-[400px]">
            <div class="mx-4 my-3">
                <img src="{{asset($veterinarian->photo ? $veterinarian->photo :'images/icon/doctor-icon.png')}}" alt="doctor-img" class="w-40 h-44 rounded-lg border border-shadeCream mx-auto">
                <p class="font-semibold text-sm mt-6">{{$veterinarian->gender === 'male' ? 'Dr.' . $veterinarian->name : 'Dra.' . $veterinarian->name}}</p>
                <p class="text-mediumGray text-sm my-1">{{$veterinarian->specialist}} Specialist</p>
                <div class="flex mt-2 items-center">
                    <img src="{{asset('images/vector/doctor-bag.svg')}}" alt="years of experience" class="w-[10px]">
                    <p class="font-semibold text-xs text-[#A4907C] ml-1">{{2024 - ($veterinarian -> graduate_year)}} Tahun</p>
                </div>

                <div class="flex my-3">
                    <img src="{{asset('images/vector/alumnus-vector.svg')}}" class="h-[30px]">
                    <div class="ml-5">
                        <p class="font-semibold text-xs mb-1">Alumnus</p>
                        <p class="text-mediumGray text-xs">{{$veterinarian -> university}}, {{$veterinarian -> graduate_year}}</p>
                    </div>
                </div>

                <div class="flex mb-5">
                    <img src="{{asset('images/vector/strnumber-vector.svg')}}" class="">
                    <div class="ml-5">
                        <p class="font-semibold text-xs mb-2">STR Number</p>
                        <p class="text-mediumGray text-xs">{{$veterinarian -> str_number}}</p>
                    </div>
                </div>
            </div>
            
        </div>
        

        <div class="flex flex-col pl-12">
            <div class="grid grid-cols-2 gap-y-1 gap-x-10 font-medium text-base">
                <p class="text-mediumGray ">Session Fee (1Hr)</p>
                <p class="text-right">Rp {{number_format($veterinarian->consultation_price, 0, ',', '.')}}</p>
                <p class="text-mediumGray">Service Fee</p>
                <p class="text-right">Rp 2.500</p>
                <p class="text-mediumGray mt-5 " >Total Payment</p>
                <p class="text-right mt-5">Rp {{number_format(($veterinarian->consultation_price + 2500), 0, ',', '.')}}</p>
            </div>

            <div class="divider my-2"></div>

            <div class="grid grid-cols-2 gap-x-10 gap-y-2 font-medium text-base">
                <p class="text-mediumGray">Account Number</p>
                <p class="text-right">123456789</p>
                <div class="grid grid-cols-subgrid col-span-2">
                    <div class="col-start-2 text-mediumGray">(Farm Care Plus)</div>
                </div>
            </div>

            <form action="{{route('user.consultation.veterinarian.order.submit', ['id' => $veterinarian->id] )}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="veterinarian_id" value="{{ $veterinarian->id }}">
                <div class="flex items-center justify-center w-full mt-9 mb-8">
                    <label id="dropzone-file" for="dropzone-file-input" class="flex flex-col items-center justify-center h-32 border border-shadeBrown rounded-lg cursor-pointer hover:bg-gray-100">
                        <div id="upload-container" class="flex flex-col items-center justify-center pt-5 pb-6">
                            <img src="{{asset('images/vector/cloud-upload.svg')}}" >
                            <p class="mb-2 text-sm text-mediumGray"><span class="font-semibold">Upload</span> proof of your payment</p>
                            <p class="text-xs text-mediumGray">in png, jpeg or jpg file</p>
                        </div>
                        
                        <input id="dropzone-file-input" type="file" name="payment_proof" type="file" class="file:rounded-lg font-medium mx-4 file-input w-64 h-10 file:normal-case file:bg-shadeBrown hover:bg-gray-100" required />
                    </label>
                </div> 

                @if ($veterinarian->serviceSchedules->isEmpty())
                    <button class="btn-base w-full mt-auto bg-gray-300 font-bold text-base text-white mb-8 rounded w-52 py-2 px-5 cursor-not-allowed" disabled>Offline</button>

                @else
                    <div class="flex justify-center">
                        <button class="btn-base w-full mt-auto bg-shadeBrown font-bold text-base text-white mb-8 rounded w-52 py-2 px-5 hover:text-shadeBrown hover:bg-white hover:outline hover:outline-1">Submit</button>
                    </div>
                @endif
            </form>

        </div>
    </div>
    @endforeach

    @if (session('error'))
    <x-alert-notification type="error" message="{{session('error')}}"/>
    @endif

    @if (session('success'))
        <x-popup-notification message="{{session('success')}}" />
    @endif
    
    @push('scripts')
        <script>
            document.getElementById('dropzone-file').addEventListener('dragover', function(event) {
                event.preventDefault();
            });

            document.getElementById('dropzone-file').addEventListener('dragleave', function(event) {
                event.preventDefault();
            });

            document.getElementById('dropzone-file').addEventListener('drop', function(event) {
                event.preventDefault();
                const fileInput = this.querySelector('input[type="file"]');
                fileInput.files = event.dataTransfer.files;
                hideUploadContainer();
            });

            document.getElementById('dropzone-file-input').addEventListener('change', function() {
                hideUploadContainer();
            });

            function hideUploadContainer() {
                document.getElementById('upload-container').style.display = 'none';
            }
        </script>
    @endpush
@endsection