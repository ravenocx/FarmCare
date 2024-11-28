@extends('layouts.veterinarian.app')

@section('title' ,'Veterinarian - Online Consultation')

@section('main-content')
<a class="flex items-center space-x-2 ml-4" href="{{route('veterinarian.consultation.order.detail', $orderId)}}">
    <img src="{{asset('images/vector/back-vector.svg')}}">
    <p class="text-base text-primaryColor">Back</p>
</a>

<div class="ml-16 mt-9 relative">
    <h1 class="font-semibold text-2xl mb-8">Detail Medicine</h1>
    <div id="formGroup" class="flex flex-col gap-y-4">
        @foreach($medicine as $data)
        <div id="inputGroup">
            <h1 class="font-semibold text-lg mb-4">Description</h1>
            <div class="mt-4 border border-[#F1DEC9] rounded-md p-8">
                <div class="">
                    <label class="text-[#888888] font-medium" for="medicine">Medicine Name</label>
                    <input type="text" id="medicine" name="medicine1" value="{{ $data->medicine }}"
                        class="bg-gray-50 mt-2 border border-[#F1DEC9] text-gray-900 text-sm rounded-lg focus:ring-[#F1DEC9] focus:border-[#F1DEC9] block w-full p-2.5"
                        disabled />
                </div>
                <div class="mt-3">
                    <label class="text-[#888888] font-medium" for="quantity">Quantity</label>
                    <input type="number" id="number-input" name="quantity1" value="{{ $data->quantity }}"
                        class="bg-gray-50 mt-2 border border-[#F1DEC9] text-gray-900 text-sm rounded-lg focus:ring-[#F1DEC9] focus:border-[#F1DEC9] block w-full p-2.5"
                        disabled />
                </div>
                <div class="mt-3">
                    <label class="text-[#888888] font-medium" for="price">Price</label>
                    <input type="number" id="number-input" name="price1" value="{{ $data->price }}"
                        class="bg-gray-50 mt-2 border border-[#F1DEC9] text-gray-900 text-sm rounded-lg focus:ring-[#F1DEC9] focus:border-[#F1DEC9] block w-full p-2.5"
                        disabled />
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @if(!$isComplete)
    <div class="flex flex-col gap-y-4 mt-10 justify-end items-end">
        <div class="flex items-center gap-x-4">
            <a href="{{ route('veterinarian.consultation.medicine.edit', $orderId) }}"
                class="text-white py-2 px-5 rounded-md text-sm font-semibold bg-[#C8B6A6]">Edit</a>
            <button data-modal-target="deleteModal" data-modal-toggle="deleteModal" type="button"
                class="text-white py-2 px-5 rounded-md text-sm font-semibold bg-[#8D7B68]">Delete</button>
        </div>
    </div>
    @endif
</div>

<!-- Delete Modal -->
<div id="deleteModal" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-[#FFF8F0] rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="deleteModal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <h1 class="text-xl font-bold text-[#8D7B68] mb-5">Are You Sure Want to<br>Remove the Medicine?</h1>
                <div class="flex items-center justify-center gap-x-4">
                    <button data-modal-hide="deleteModal" type="button"
                        class="text-[#8D7B68] border border-[#8D7B68] focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-semibold rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Cancel
                    </button>
                    <form action="{{ route('veterinarian.consultation.medicine.destroy') }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="orderId" value="{{ $orderId }}">
                        <button type="submit"
                            class="py-2.5 px-5 ms-3 text-sm font-semibold text-white focus:outline-none bg-[#8D7B68] rounded-lg border border-[#8D7B68] focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="updateModal" class="hidden z-50 overflow-y-auto overflow-x-hidden w-screen h-screen fixed top-0 left-0 grid place-items-center">
    <div class="w-full max-w-md">
        <div class="relative bg-[#FFF8F0] rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="updateModal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <h1 class="text-xl font-bold text-[#8D7B68] mb-5">Data Updated<br>Successfully</h1>
                <button data-modal-hide="updateModal" type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-semibold text-white focus:outline-none bg-[#8D7B68] rounded-lg border border-[#8D7B68] focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Ok!</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // Check if the session success is not empty
        @if(session('success'))
        // Show the modal
        document.getElementById('updateModal').classList.remove('hidden');
        document.getElementById('updateModal').classList.add('bg-gray-900/50');
        @endif

        // Add event listener to hide modal when "Ok!" button is clicked
        document.querySelectorAll('[data-modal-hide="updateModal"]').forEach(button => {
            button.addEventListener('click', function () {
                document.getElementById('updateModal').classList.add('hidden');
            });
        });
    });

</script>
@endsection
