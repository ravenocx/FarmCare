@extends('layouts.veterinarian.app')

@section('title' ,'Veterinarian - Online Consultation')

@section('main-content')
<a class="flex items-center space-x-2 ml-4" href="{{route('veterinarian.consultation')}}">
    <img src="{{asset('images/vector/back-vector.svg')}}">
    <p class="text-base text-primaryColor">Back</p>
</a>

<div class="ml-16 mt-9">
    <h1 class="font-semibold text-2xl mb-12">Order History Detail</h1>

    <div class="flex">
        <div class="font-medium text-lg w-1/2 border-shadeBrown border-r-2">
            <div class="grid grid-cols-2 mb-5">
                <h3 class="text-mediumGray mb-1">Order ID</h3>
                <h3 class="text-mediumGray mb-1">Status</h3>
                <p>Order-{{$order->id}}</p>
                <p
                    class="{{$order->order_status == 'Complete' ? 'text-green-500' : ($order->order_status == 'Cancel' ? 'text-red-500' : 'text-yellow-500')}}">
                    {{$order->order_status}}</p>
            </div>

            <h3 class="text-mediumGray mb-1">Customer Details</h3>
            <div class="flex items-center mb-6">
                <img src="{{asset($order->user->photo ? :'images/icon/profile-icon.svg')}}" alt="profile-image"
                    class="object-fill w-[73px] h-20 rounded-lg border border-shadeBrown">
                <div class="ml-4">
                    <p class="mb-1">{{$order->cust_name}}</p>
                    <a href="https://wa.me/{{$order->cust_phone_number}}" target="blank">
                        (<span class="underline mb-5">{{$order->cust_phone_number}}</span>)
                    </a>
                </div>
            </div>

            <h3 class="text-mediumGray mb-1">Invoice</h3>
            <a href="{{$order -> payment_proof}}" target="_blank" class="underline">
                Payment Proof Image
            </a>
        </div>

        <div class="w-1/2 font-medium pl-12 text-lg">
            <div class="grid grid-cols-2 mb-10">
                <h3 class="text-mediumGray mb-1">Service Category</h3>
                <h3 class="text-mediumGray mb-1">Order Date</h3>
                <p>{{$order->service_category == 'consultation' ? 'Online Consultation' : 'Offline Reservation'}}</p>
                <p>{{ Carbon\Carbon::parse($order -> order_date)->format('d/m/Y') }}</p>
            </div>

            <h2 class="font-semibold text-xl mb-10">Payment Summary</h2>

            <div class="w-96 grid grid-cols-2 gap-y-1 gap-x-16 font-medium">
                <p class="text-mediumGray ">Session Fee (1Hr)</p>
                <p class="text-right">Rp {{number_format($order->price, 0, ',', '.')}}</p>
                <p class="text-mediumGray">Service Fee</p>
                <p class="text-right">Rp 2.500</p>
                <p class="text-mediumGray mt-5 ">Total Payment</p>
                <p class="text-right mt-5">Rp {{number_format($order->price + 2500, 0, ',', '.')}}</p>
            </div>
        </div>
    </div>
    @if(count($order->medication) > 0)
    <div class="flex items-center gap-x-5 mt-10 justify-center">
        <a href="{{ route('veterinarian.consultation.medicine.detail', $order->id) }}"
            class="bg-[#8D7B68] w-fit text-white font-medium rounded-md py-2 px-4">
            View Medicine
        </a>
        @if($order->medicine == "Complete")
        <button type="button" disabled
            class="bg-[#d3c4b6] w-fit text-white font-medium rounded-md py-2 px-4">
            Send Medicine
        </button>
        @else
        <button type="button" data-modal-target="sendMedicine" data-modal-toggle="sendMedicine"
            class="bg-[#8D7B68] w-fit text-white font-medium rounded-md py-2 px-4">
            Send Medicine
        </button>
        @endif
    </div>
    @else
    <a href="{{ route('veterinarian.consultation.medicine.create', $order->id) }}"
        class="bg-[#C8B6A6] w-fit text-white font-medium rounded-md py-2 px-4 flex items-center gap-x-2 mx-auto mt-10">
        <div class="grid place-items-center w-7 h-7 rounded-full bg-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="C8B6A6" viewBox="0 0 24 24" stroke-width="2" stroke="#C8B6A6"
                class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
        </div>
        Add Medicine
    </a>
    @endif
</div>

<div id="sendMedicine" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-[#FFF8F0] rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="sendMedicine">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <h1 class="text-xl font-bold text-[#8D7B68] mb-5">Are You Sure Want to<br>Send the Medicine?</h1>
                <div class="flex items-center justify-center gap-x-4">
                    <button data-modal-hide="sendMedicine" type="button"
                        class="text-[#8D7B68] border border-[#8D7B68] focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-semibold rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Cancel
                    </button>
                    <form action="{{ route('veterinarian.consultation.medicine.send') }}" method="post">
                        @csrf
                        <input type="hidden" name="orderId" value="{{ $order->id }}">
                        <button type="submit"
                            class="py-2.5 px-5 ms-3 text-sm font-semibold text-white focus:outline-none bg-[#8D7B68] rounded-lg border border-[#8D7B68] focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Yes, Sure!</button>
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
                <h1 class="text-xl font-bold text-[#8D7B68] mb-5">The medicine was delivered successfully</h1>
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
