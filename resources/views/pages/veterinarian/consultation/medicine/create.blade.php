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

<form action="{{ route('veterinarian.consultation.medicine.store') }}" method="POST" class="ml-16 mt-9 relative">
    @csrf
    <input type="hidden" id="myNumber" name="myNumber" value="1">
    <input type="hidden" name="orderId" value="{{ $orderId }}">
    <h1 class="font-semibold text-2xl mb-8">Input Medicine</h1>
    <div id="formGroup" class="flex flex-col gap-y-4">
        <div id="inputGroup">
            <h1 class="font-semibold text-lg mb-4">Description</h1>
            <div class="mt-4 border border-[#F1DEC9] rounded-md p-8">
                <div class="">
                    <label class="text-[#888888] font-medium" for="medicine">Medicine Name</label>
                    <input type="text" id="medicine" name="medicine1"
                        class="bg-gray-50 mt-2 border border-[#F1DEC9] text-gray-900 text-sm rounded-lg focus:ring-[#F1DEC9] focus:border-[#F1DEC9] block w-full p-2.5"
                        placeholder="Medicine Name..." required />
                </div>
                <div class="mt-3">
                    <label class="text-[#888888] font-medium" for="quantity">Quantity</label>
                    <input type="number" id="number-input" name="quantity1"
                        class="bg-gray-50 mt-2 border border-[#F1DEC9] text-gray-900 text-sm rounded-lg focus:ring-[#F1DEC9] focus:border-[#F1DEC9] block w-full p-2.5"
                        placeholder="quantity..." required />
                </div>
                <div class="mt-3">
                    <label class="text-[#888888] font-medium" for="price">Price</label>
                    <input type="number" id="number-input" name="price1"
                        class="bg-gray-50 mt-2 border border-[#F1DEC9] text-gray-900 text-sm rounded-lg focus:ring-[#F1DEC9] focus:border-[#F1DEC9] block w-full p-2.5"
                        placeholder="price..." required />
                </div>
            </div>
        </div>
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
<script>
    let counter = 1;

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
                    <label class="text-[#888888] font-medium" for="medicine${counter}">Medicine Name</label>
                    <input type="text" id="medicine${counter}" name="medicine${counter}"
                        class="bg-gray-50 mt-2 border border-[#F1DEC9] text-gray-900 text-sm rounded-lg focus:ring-[#F1DEC9] focus:border-[#F1DEC9] block w-full p-2.5"
                        placeholder="Medicine Name..." required />
                </div>
                <div class="mt-3">
                    <label class="text-[#888888] font-medium" for="quantity${counter}">Quantity</label>
                    <input type="number" id="quantity${counter}" name="quantity${counter}"
                        class="bg-gray-50 mt-2 border border-[#F1DEC9] text-gray-900 text-sm rounded-lg focus:ring-[#F1DEC9] focus:border-[#F1DEC9] block w-full p-2.5"
                        placeholder="quantity..." required />
                </div>
                <div class="mt-3">
                    <label class="text-[#888888] font-medium" for="price${counter}">Price</label>
                    <input type="number" id="price${counter}" name="price${counter}"
                        class="bg-gray-50 mt-2 border border-[#F1DEC9] text-gray-900 text-sm rounded-lg focus:ring-[#F1DEC9] focus:border-[#F1DEC9] block w-full p-2.5"
                        placeholder="price..." required />
                </div>
                <button type="button" class="remove-btn text-red-500 mt-2">Remove</button>
            </div>
        `;

        formGroup.appendChild(newInputGroup);

        newInputGroup.querySelector('.remove-btn').addEventListener('click', function() {
            if (document.querySelectorAll('#formGroup > div').length > 1) {
                newInputGroup.remove();
                counter--;
                updateMyNumber(-1);
            }
        });
    });

    document.querySelector('.remove-btn').addEventListener('click', function() {
        if (document.querySelectorAll('#formGroup > div').length > 1) {
            counter--;
            this.closest('#inputGroup0').remove();
            updateMyNumber(-1);
        }
    });

    function updateMyNumber(amount) {
        const myNumberInput = document.getElementById('myNumber');
        let currentValue = parseInt(myNumberInput.value);
        currentValue = isNaN(currentValue) ? 0 : currentValue;
        currentValue += amount;
        myNumberInput.value = currentValue;
    }

</script>
@endsection
