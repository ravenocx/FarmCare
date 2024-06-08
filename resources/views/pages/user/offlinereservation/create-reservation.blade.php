@extends('layouts.user.app')

@section('title', 'FarmCare - offline Reservation')

@section('main-content')

    <div class="container mx-auto px-4">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6" style="margin-top: 150px">
            <!-- Left Section - Doctor Profile -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4">Doctor {{ $veterinarian->name }} Profile's</h2>
                <!-- Doctor Profile Content -->
                <img class="w-full h-50 object-cover" src="{{ $veterinarian->photo }}">

                <div class="mb-4">
                    <h3 class="text-lg font-semibold mt-4">{{ $veterinarian->name }}</h3>
                    <p class="font-bold mt-5">Specialist: </p>
                    <p class="text-black-600">{{ $veterinarian->specialist }} </p>
                </div>
                <!-- Other profile details -->
                <div>
                    <p class="font-bold mt-5">Price: <span class="text-gray-500">Rp.
                            {{ number_format($veterinarian->reservation_price, 0, '.', '') }} / visit</span></p>
                </div>
            </div>

            <!-- Right Section - Reservation Form -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4">Make a Reservation</h2>
                <form action="{{ url('/make-offline-reservation') }}" method="POST"
                    class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <!-- Customer Name -->
                    <div class="mb-4">
                        <label for="cust_name" class="block text-gray-700 text-sm font-bold mb-2">Customer Name</label>
                        <input type="text" id="cust_name" name="cust_name" placeholder="Customer Name"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <!-- Order address -->
                    <div class="mb-4">
                        <label for="order_address" class="block text-gray-700 text-sm font-bold mb-2">Address</label>
                        <input type="text" id="order_address" name="order_address" placeholder="Order Address"
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <!-- Customer Phone Number -->
                    <div class="mb-4">
                        <label for="cust_phone_number" class="block text-gray-700 text-sm font-bold mb-2">Customer Phone
                            Number</label>
                        <input type="text" id="cust_phone_number" name="cust_phone_number"
                            placeholder="Customer Phone Number"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-6">
                        <label for="countries" class="block text-gray-700 text-sm font-bold mb-2">Available Schedule</label>
                        <select id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="schedule_id">
                            <option selected>Choose the schedules</option>

                            @foreach ($veterinarian->serviceSchedules as $index => $schedule)
                                {
                                    @if ($schedule->service_category === 'reservation' && !$schedule->is_reserved)
            
                                        <option value="{{ $schedule->id }}">
                                    {{ \Carbon\Carbon::parse($schedule->schedule_start)->format('d M Y H:i') }} -
                                    {{ \Carbon\Carbon::parse($schedule->schedule_end)->format('d M Y H:i') }}</option>
                                    } else {
                                        continue
                                    }
                                    @endif

                                
                                }
                            @endforeach
                        </select>
                    </div>

                    <!-- Veterinarian Phone Number -->
                    <div class="mb-4">
                        <label for="veter_phone_number" class="block text-gray-700 text-sm font-bold mb-2">Veterinarian
                            Phone Number</label>
                        <input type="text" id="veter_phone_number" name="veter_phone_number"
                            value="{{ $veterinarian->phone_number }}"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            readonly>
                    </div>

                    <!-- Payment Proof -->
                    <div class="mb-4">
                        <label for="payment_proof" class="block text-gray-700 text-sm font-bold mb-2">Payment Proof <span
                                class="font-bold">BCA A.n Farm Care XXXXXXXX</span>
                        </label>
                        <input type="file" id="payment_proof" name="payment_proof" placeholder="Payment Proof"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <!-- Category -->
                    <div class="mb-4">
                        <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
                        <input type="text" id="category" name="category" value="{{ $veterinarian->specialist }}"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            readonly>
                    </div>

                    <!-- Price -->
                    <div class="mb-6">
                        <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                        <input type="number" id="price" name="price" value="{{ $veterinarian->reservation_price }}"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            readonly>
                    </div>

                    <input type="hidden" name="veterinarian_id" value="{{ $veterinarian->id }}">

                    <!-- Submit Button -->
                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Submit
                        </button>
                    </div>
                </form>


            </div>

            @if (session('error'))
        <x-alert-notification type="error" message="{{ session('error') }}" />
    @endif

    @if (session('success'))
        <x-alert-notification type="success" message="{{ session('success') }}" />
    @endif
        @endsection
