@extends('layouts.veterinarian.app')

@section('title', 'Veterinarian - Offline Reservation')

@section('main-content')
    <div class="flex justify-between mr-6 mb-12">
        <h1 class="font-medium text-4xl">Offline Reservation</h1>
        <a href="{{ url('veterinarian/create-offline-reservation') }}">
            <button
                class="btn-base w-full bg-[#C8B6A6] font-bold text-base text-white rounded py-2 px-5 hover:text-shadeBrown hover:bg-white hover:outline hover:outline-1">Add
                Schedule</button>
        </a>
    </div>
    <h2 class="font-semibold text-base mb-6">My Offline Reservation Schedule</h2>
    <div class="grid grid-cols-3">
    
        @foreach ($services as $index => $service)
            <div class=" border-b-2 border-shadeCream py-4">
                <div class="flex">
                    <div
                        class="{{ $index % 3 == 0 ? ($index === count($services) - 1 ? '' : 'pr-6 border-r-2') : (($index + 1) % 3 == 0 ? 'pl-6' : 'px-6 border-r-2') }}  border-shadeCream">
                        <div class="flex text-sm">
                            <img src="{{ Auth::guard('veterinarian')->user()->photo ?: asset('images/assets/vet-schedule-image.svg') }}"
                                class="rounded-lg border border-shadeBrown w-[150px] h-28">
                            <div class="w-[224.22px] ml-2 space-y-2">
                                <p class="font-bold">
                                    {{ (Auth::guard('veterinarian')->user()->gender == 'male' ? 'Dr.' : 'Dra.') . Auth::guard('veterinarian')->user()->name }}
                                </p>
                                <p class="font-bold">Offline Reservation</p>
                                <p class="text-[#FF0000]">
                                    {{ Carbon\Carbon::parse($service->schedule_start)->format('d/m/Y') }}
                                    {{ Carbon\Carbon::parse($service->schedule_start)->format('H:i') }} -
                                    {{ Carbon\Carbon::parse($service->schedule_end)->format('H:i') }}</p>
                                @if ($service->is_reserved)
                                    <p class="text-green-800">Reserved</p>
                                @else
                                    <p class="text-yellow-400">Not Reserved</p>
                                @endif
                            </div>
                        </div>

                        <div class="flex justify-center mt-5 space-x-3">
                            @if (Carbon\Carbon::parse($service->schedule_end)->isAfter(Carbon\Carbon::now()) && !($service->is_reserved))
                                <a href="{{ url('veterinarian/offline-reservation/' . $service->id . '/edit') }} "data-id="{{ $service->id }}">
                                    <button
                                        class="btn-base bg-shadeBrown font-bold text-xs text-white rounded py-2 px-5 hover:text-shadeBrown hover:bg-white hover:outline hover:outline-1" data-testid="edit-button">Edit</button>
                                </a>
                                <form action="{{ url('veterinarian/offline-reservation/' . $service->id . '/delete') }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                        class="btn-base bg-[#DF0000] font-bold text-xs text-white rounded py-2 px-3 hover:text-[#DF0000] hover:bg-white hover:outline hover:outline-1"
                                        type="submit"data-testid="delete-button">
                                        Cancel
                                    </button>
                                </form>
                            @else
                                @if ($service->is_reserved)
                                    <button class="btn-base bg-gray-300 text-xs font-bold text-white rounded py-2 px-5 cursor-not-allowed" disabled>Reserved</button>
                                    @else
                                <button
                                    class="btn-base bg-gray-300 text-xs font-bold text-white rounded py-2 px-5 cursor-not-allowed"
                                    disabled>Schedule Ended</button>
                                <form action="{{ url('veterinarian/offline-reservation/' . $service->id . '/delete') }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                        class="btn-base bg-[#DF0000] font-bold text-xs text-white rounded py-2 px-3 hover:text-[#DF0000] hover:bg-white hover:outline hover:outline-1"
                                        type="submit"data-testid="delete-button">
                                        Cancel
                                    </button>
                                </form>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <section class="pb-10 border-b-2 border-shadeCream mb-5 mt-5">
        <h2 class="font-semibold text-base mb-6">On Going Offline Reservation</h2>

        <div class="container mx-auto relative overflow-x-auto overflow-y-auto max-h-[312px] shadow-md sm:rounded-lg">
            <table class="w-full text-base text-left rtl:text-right">
                <thead class="text-base text-white font-medium bg-shadeBrown sticky top-0">
                    <tr class="text-center">
                        <th class="w-4 p-4">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Order ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Patient
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Patient address
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Patient Phone Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Invoice
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($onGoingOrders as $order)
                        <tr class="border-b dark:bg-gray-800 dark:border-gray-700  dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                {{ $loop->iteration }}
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $order->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $order->cust_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $order->order_address }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="https://wa.me/{{ $order->cust_phone_number }}" class="underline" target="blank">
                                    {{ $order->cust_phone_number }}
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <img src="{{ asset('/storage/' . $order->payment_proof) }}"
                                    style="width: 200px; height:200px;">
                            </td>
                            <form action="{{ url('veterinarian/update-offline-reservation/' . $order->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <td class="px-6 py-3 flex justify-center">
                                    <select id="status" name="order_status"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option>{{ $order->order_status }}</option>
                                        <option value="Complete">Complete</option>
                                        <option value="Cancel">Cancel</option>
                                    </select>

                                    <button type="submit" id="updateButton"
                                        class="flex items-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" class="w-6 h-6 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                        </svg>
                                    </button>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <section>
        <div class="flex justify-between mr-6 mb-5">
            <h2 class="font-semibold text-base">Latest Order</h2>
            
            <!--TODO : Link to order history-->
        </div>

       

            @foreach ($latestOrders as $order)
        <div class="flex text-xl font-medium mb-6">
            <p class="text-[#8C8F93]">Order Date</p>
            <p class="ml-5">{{ date('d-m-Y', strtotime($order->order_date)) }}</p>
            <p class="text-[#8C8F93] ml-32">Order ID</p>
            <p class="ml-5">Order-{{ $order->id }}</p>
        </div>
    <div class="flex items-center bg-secondaryColor py-5 pl-8 pr-4">
        

        <!-- Customer Info -->
        <div class="text-lg ml-4">
            <p class="text-mediumGray mb-3">Patient Name</p>
            <p class="font-medium">{{ $order->cust_name }}</p>
        </div>

        <!-- Service Info -->
        <div class="text-lg ml-36 mr-20">
            <p class="text-mediumGray mb-3">Service</p>
            <p class="font-medium">{{ $order->service_name ?? 'offline reservation' }}</p>
        </div>

        <!-- Status Info -->
        <div class="text-lg">
            <p class="text-mediumGray mb-3">Status</p>
            <p class="font-medium">{{ $order->order_status }}</p>
        </div>

        <!-- Order Detail Button -->
        <a href="{{url('/veterinarian/offline-reservation/'. $order->id)}}" class="ml-auto mr-10">
            <button
                class="btn-lg bg-white border-black border font-medium text-lg rounded-lg py-5 px-7 hover:bg-shadeBrown hover:text-white hover:border-none"data-testid="detail-button">
                Order Detail
            </button>
        </a>
    </div>
    @endforeach

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modalButtons = document.querySelectorAll('[data-modal-target="popup-modal"]');
            const deleteForm = document.getElementById('delete-form');

            modalButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const serviceId = this.getAttribute('data-service-id');
                    deleteForm.action = `veterinarian/offline-reservation/${serviceId}/delete`;
                });
            });
        });
    </script>

    @push('scripts')
        <script>
            function submitChange() {
                document.getElementById("submit-button").click();
            }
        </script>
    @endpush

    @if (session('error'))
        <x-alert-notification type="error" message="{{ session('error') }}" />
    @endif

    @if (session('success'))
        <x-alert-notification type="success" message="{{ session('success') }}" />
    @endif
@endsection
