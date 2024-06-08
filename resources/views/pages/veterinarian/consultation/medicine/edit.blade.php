@extends('layouts.veterinarian.app')

@section('title' ,'Veterinarian - Online Consultation')

@section('main-content')
<style>
    .input-wrapper {
        position: relative;
        display: inline-block;
    }
    .input-wrapper input[type="number"] {
        padding-right: 50px; /* Tambah padding untuk mengakomodasi satuan */
    }
    .input-wrapper .unit {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none; /* Agar satuan tidak mengganggu input */
    }
</style>
<a class="flex items-center space-x-2 ml-4" href="{{route('veterinarian.consultation.order.detail', $orderId)}}">
    <img src="{{asset('images/vector/back-vector.svg')}}">
    <p class="text-base text-primaryColor">Back</p>
</a>

<form action="{{ route('veterinarian.consultation.medicine.update') }}" method="POST" class="ml-16 mt-9 relative">
    @csrf
    @method('patch')
    <input type="hidden" id="myNumber" name="myNumber" value="0">
    <input type="hidden" name="orderId" value="{{ $orderId }}">
    <h1 class="font-semibold text-2xl mb-8">Edit Medicine</h1>
    <div id="formGroup" class="flex flex-col gap-y-4">
        @foreach($medicine as $data)
        <div id="inputGroup">
            <h1 class="font-semibold text-lg mb-4">Description</h1>
            <div class="mt-4 border border-[#F1DEC9] rounded-md p-8">
                <div class="">
                    <label class="text-[#888888] font-medium" for="medicine">Medicine Name</label>
                    <input type="text" id="medicine" name="medicine{{ $data->id }}" value="{{ $data->medicine }}"
                        class="bg-gray-50 mt-2 border border-[#F1DEC9] text-gray-900 text-sm rounded-lg focus:ring-[#F1DEC9] focus:border-[#F1DEC9] block w-full p-2.5"
                        required />
                </div>
                <div class="mt-3">
                    <label class="text-[#888888] font-medium" for="quantity">Quantity</label>
                    <input type="number" id="number-input" name="quantity{{ $data->id }}" value="{{ $data->quantity }}"
                        class="bg-gray-50 mt-2 border border-[#F1DEC9] text-gray-900 text-sm rounded-lg focus:ring-[#F1DEC9] focus:border-[#F1DEC9] block w-full p-2.5"
                        required />
                </div>
                <div class="mt-3">
                    <label class="text-[#888888] font-medium" for="price">Price</label>
                    <input type="number" id="number-input" name="price{{ $data->id }}" value="{{ $data->price }}"
                        class="bg-gray-50 mt-2 border border-[#F1DEC9] text-gray-900 text-sm rounded-lg focus:ring-[#F1DEC9] focus:border-[#F1DEC9] block w-full p-2.5"
                        required />
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="flex flex-col gap-y-4 mt-10 justify-end items-end">
        <button type="button" id="addButton" class="bg-[#C8B6A6] w-fit text-white font-medium rounded-md py-2 px-4 flex items-center gap-x-2">
            <div class="grid place-items-center w-7 h-7 rounded-full bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="C8B6A6" viewBox="0 0 24 24" stroke-width="2"
                    stroke="#C8B6A6" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </div>
            Add Other
        </button>
        <div class="flex items-center gap-x-4">
            <button type="submit" class="text-white py-2 px-5 rounded-md text-sm font-semibold bg-[#C8B6A6]">Save</button>
            <a href="{{route('veterinarian.consultation.order.detail', $orderId)}}" class="text-white py-2 px-5 rounded-md text-sm font-semibold bg-[#8D7B68]">Discard</a>
        </div>
    </div>
</form>

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
                <button data-modal-hide="deleteModal" type="button"
                    class="text-[#8D7B68] border border-[#8D7B68] focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-semibold rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Cancel
                </button>
                <button data-modal-hide="deleteModal" type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-semibold text-white focus:outline-none bg-[#8D7B68] rounded-lg border border-[#8D7B68] focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Delete</button>
            </div>
        </div>
    </div>
</div>


<script>
    let counter = 0;

    document.getElementById('addButton').addEventListener('click', function() {
        counter++;
        updateMyNumber(1);

        const formGroup = document.getElementById('formGroup');
        const newInputGroup = document.createElement('div');
        newInputGroup.id = 'inputGroup' + counter;
        newInputGroup.innerHTML = `
            <h1 class="font-semibold text-lg mb-4">Description</h1>
            <div class="mt-4 border border-[#F1DEC9] rounded-md p-8">
                <div class="">
                    <label class="text-[#888888] font-medium" for="newMedicine${counter}">Medicine Name</label>
                    <input type="text" id="newMedicine${counter}" name="newMedicine${counter}"
                        class="bg-gray-50 mt-2 border border-[#F1DEC9] text-gray-900 text-sm rounded-lg focus:ring-[#F1DEC9] focus:border-[#F1DEC9] block w-full p-2.5"
                        placeholder="Medicine Name..." required />
                </div>
                <div class="mt-3">
                    <label class="text-[#888888] font-medium" for="newQuantity${counter}">Quantity</label>
                    <input type="number" id="newQuantity${counter}" name="newQuantity${counter}"
                        class="bg-gray-50 mt-2 border border-[#F1DEC9] text-gray-900 text-sm rounded-lg focus:ring-[#F1DEC9] focus:border-[#F1DEC9] block w-full p-2.5"
                        placeholder="quantity..." required />
                </div>
                <div class="mt-3">
                    <label class="text-[#888888] font-medium" for="newPrice${counter}">Price</label>
                    <input type="number" id="newPrice${counter}" name="newPrice${counter}"
                        class="bg-gray-50 mt-2 border border-[#F1DEC9] text-gray-900 text-sm rounded-lg focus:ring-[#F1DEC9] focus:border-[#F1DEC9] block w-full p-2.5"
                        placeholder="price..." required />
                </div>
                <button type="button" class="remove-btn text-red-500 mt-2">Remove</button>
            </div>
        `;

        formGroup.appendChild(newInputGroup);

        // Add event listener to the new remove button
        newInputGroup.querySelector('.remove-btn').addEventListener('click', function() {
            if (document.querySelectorAll('#formGroup > div').length > 1) {
                newInputGroup.remove();
                updateMyNumber(-1);
                counter--;
            }
        });
    });

    function updateMyNumber(amount) {
        const myNumberInput = document.getElementById('myNumber');
        let currentValue = parseInt(myNumberInput.value);
        currentValue = isNaN(currentValue) ? 0 : currentValue;
        currentValue += amount;
        myNumberInput.value = currentValue;
    }

    document.querySelector('.remove-btn').addEventListener('click', function() {
        if (document.querySelectorAll('#formGroup > div').length > 1) {
            this.closest('#inputGroup0').remove();
            updateMyNumber(-1);
            counter--;
        }
    });
</script>
@endsection