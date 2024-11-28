@extends('layouts.user.app')

@section('title','FarmCare - Medication Delivery')

@section('main-content')
<div class="flex items-center mb-16 ml-[100px]">
  <h2 class="pt-16 font-medium text-3xl">Buy Medicine</h2>
</div>

<form action="{{ route('user.medicdeliv.upload.submit', ['id' => $medication -> id]) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PATCH')
  <div class="flex flex-col items-center justify-center border border-[#F1DEC9] rounded-lg w-[550px] mx-auto mt-4">
    <div class="flex items-center justify-center w-full mt-6">
      <div class="text-mediumGray ">Account Number</div>
      <div class="font-medium text-black ml-[220px]">123456789</div>
    </div>
    <div class="mt-2 text-mediumGray ml-[310px]">(Farm Care Plus)</div>

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



  </div>
  <div class="flex justify-center mt-10">
      <button class="btn-base w-[650px] mt-auto bg-shadeBrown font-bold text-lg text-white mb-8 rounded py-2 px-5 hover:text-shadeBrown hover:bg-white hover:outline hover:outline-1" type="submit">Process to Payment</button>
  </div>
</form>


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