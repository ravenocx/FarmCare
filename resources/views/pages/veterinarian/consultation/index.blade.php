@extends('layouts.veterinarian.app')

@section('title', 'Veterinarian - Consultation')

@section('main-content')
    <div class="flex justify-between mr-6 mb-12">
        <h1 class="font-medium text-4xl">Online Consultation</h1>
        <a href="{{route('veterinarian.consultation.schedule.create')}}">
            <button class="btn-base w-full bg-[#C8B6A6] font-bold text-base text-white rounded py-2 px-5 hover:text-shadeBrown hover:bg-white hover:outline hover:outline-1">Add Schedule</button>
        </a>
    </div>

    <div class="flex justify-between mr-6">
        <h2 class="font-semibold text-base mb-5">Schedules</h2>
        <a href="{{route('veterinarian.consultation.schedule')}}" class="font-semibold text-shadeBrown text-base" dusk="schedule-viewall"> View All ></a>
    </div>

    <section class="flex justify-center pb-5 border-b-2 border-shadeCream mb-5">
        @foreach($serviceSchedules as $index => $serviceSchedule)
            <div class="{{ $index == 0 ? (count($serviceSchedules) === 1 ? '' : 'pr-6 border-r-2') : ($index == 1 ? 'px-6 border-r-2' : 'pl-6') }}  border-shadeCream">
                <div class="flex text-xs">
                    <img src="{{Auth::guard('veterinarian')->user()->photo ? : asset('images/assets/vet-schedule-image.svg')}}" class="rounded-lg border border-shadeBrown w-[150px] h-28">
                    <div class="ml-2 space-y-2">
                        <p class="font-bold">{{(Auth::guard('veterinarian')->user()->gender == 'male' ? 'Dr.' :'Dra.') . Auth::guard('veterinarian')->user()->name}}</p>
                        <p class="font-bold">Online Consultation</p>
                        @if(Carbon\Carbon::parse($serviceSchedule->schedule_start)->isSameDay(Carbon\Carbon::parse($serviceSchedule->schedule_end)))
                            <p class="text-[#FF0000]">{{ Carbon\Carbon::parse($serviceSchedule->schedule_start)->format('d/m/Y') }} {{ Carbon\Carbon::parse($serviceSchedule->schedule_start)->format('H:i') }} - {{ Carbon\Carbon::parse($serviceSchedule->schedule_end)->format('H:i') }}</p>
                        @else
                            <p class="text-[#FF0000]">{{ Carbon\Carbon::parse($serviceSchedule->schedule_start)->format('d/m/Y') }} {{ Carbon\Carbon::parse($serviceSchedule->schedule_start)->format('H:i') }} to</p>
                            <p class="text-[#FF0000]">{{ Carbon\Carbon::parse($serviceSchedule->schedule_end)->format('d/m/Y') }} {{ Carbon\Carbon::parse($serviceSchedule->schedule_end)->format('H:i') }}</p>
                        @endif
                        @if($serviceSchedule->is_reserved)
                            <p class="text-green-800">Reserved</p>
                        @else
                            <p class="text-yellow-400">Not Reserved</p>
                        @endif
                    </div>
                </div>
        
                <div class="flex justify-center mt-5 space-x-3">
                    @if(Carbon\Carbon::parse($serviceSchedule->schedule_end)->isAfter(Carbon\Carbon::now()) && !($serviceSchedule->is_reserved))
                        <a href="{{route('veterinarian.consultation.schedule.edit' , ['id' => $serviceSchedule -> id])}}">
                            <button class="btn-base bg-shadeBrown font-bold text-xs text-white rounded py-2 px-5 hover:text-shadeBrown hover:bg-white hover:outline hover:outline-1">Edit</button>
                        </a>
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="btn-base bg-[#DF0000] font-bold text-xs text-white rounded py-2 px-3 hover:text-[#DF0000] hover:bg-white hover:outline hover:outline-1" type="button">
                            Cancel
                        </button>
                    @else
                        <button class="btn-base bg-gray-300 text-xs font-bold text-white rounded py-2 px-5 cursor-not-allowed" disabled>{{$serviceSchedule->is_reserved ? 'Reserved' : 'Schedule Ended'}}</button>
                    @endif
                </div>
            </div>

            <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow-3xl dark:bg-gray-700">
                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this schedule?</h3>

                            <form action="{{route('veterinarian.consultation.schedule.delete', ['id' =>$serviceSchedule -> id ])}}" method="POST">
                                @csrf
                                @method('delete')
                                <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Yes, Delete it
                                </button>
                                <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border-2 border-gray-400 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                    Cancel
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>

    <section class="pb-10 border-b-2 border-shadeCream mb-5">
        <h2 class="font-semibold text-base mb-6">On Going Online Consultation</h2>

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
                        @foreach($onGoingOrders as $index => $order)
                        <tr class="border-b dark:bg-gray-800 dark:border-gray-700  dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                {{$index+1}}
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                #{{$order -> id}}
                            </th>
                            <td class="px-6 py-4">
                                {{$order -> cust_name}}
                            </td>
                            <td class="px-6 py-4">
                                <a href="https://wa.me/{{$order -> cust_phone_number}}" class="underline" target="blank">
                                    {{$order -> cust_phone_number}}
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{$order -> payment_proof}}" target="_blank" class="underline">
                                    Invoice Image
                                </a>
                            </td>
                            <form action="{{route('veterinarian.consultation.status.edit.submit', ['id' => $order -> id])}}" method="POST">
                            @csrf
                            @method('PATCH')
                                <td class="px-6 py-3 flex justify-center">
                                    <select id="status" name="status" onchange="submitChange()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="On going" {{ $order->order_status == "On going" ? 'selected' : '' }}>On going</option>
                                        <option value="Complete" {{ $order->order_status == "Complete" ? 'selected' : '' }}>Complete</option>
                                        <option value="Cancel" {{ $order->order_status == "Cancel" ? 'selected' : '' }}>Cancel</option>
                                    </select>
                                    <button type="submit" class="hidden" id="submit-button">Submit</button>
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
            <a href="" class="font-semibold text-shadeBrown text-base"> View All ></a> <!--TODO : Link to order history-->
        </div>

        @foreach($latestOrders as $index => $latestOrder)
        <div class="pb-7 border-shadeCream {{count($latestOrders) == 1 ? '' : 'border-b-2 mb-5' }} " id="latest-order">
            <div class="flex text-xl font-medium mb-6">
                <p class="text-[#8C8F93]">Order Date</p>
                <p class="ml-5">{{ Carbon\Carbon::parse($latestOrder -> order_date)->format('d/m/Y') }}</p>
                <p class="text-[#8C8F93] ml-32">Order ID</p>
                <p class="ml-5">Order-{{$latestOrder -> id}}</p>
            </div>

            <div class="flex items-center bg-secondaryColor py-5 pl-8 pr-4">

                <img src="{{asset($latestOrder->user->photo ? :'images/icon/profile-icon.svg')}}" alt="profile-image" class="object-fill w-[73px] h-20 rounded-lg border border-shadeBrown">

                <div class="text-lg ml-4">
                    <p class="font-medium mb-1">{{$latestOrder -> cust_name}}</p>
                    <p class="text-mediumGray">{{$latestOrder -> cust_phone_number}}</p>
                </div>

                <div class="text-lg ml-36 mr-20">
                    <p class="text-mediumGray mb-3">Service</p>
                    <p class="font-medium">Online Consultation</p>
                </div>

                <div class="text-lg">
                    <p class="text-mediumGray mb-3">Status</p>
                    <p class="font-medium {{$latestOrder->order_status === 'Complete' ? 'text-green-500' : 'text-red-500' }}">{{$latestOrder -> order_status}}</p>
                </div>

                <a href="{{route('veterinarian.consultation.order.detail', ['id' => $latestOrder->id])}}" class="ml-auto mr-10">
                    <button class="btn-lg bg-white border-black border font-medium text-lg rounded-lg py-5 px-7 hover:bg-shadeBrown hover:text-white hover:border-none">Order Detail</button>
                </a>
            </div>
        </div>
        @endforeach
    </section>

    @push('scripts')
    <script>
        function submitChange(){
            document.getElementById("submit-button").click();
        }
    </script>

    @endpush

    @if (session('error'))
    <x-alert-notification type="error" message="{{session('error')}}"/>
    @endif

    @if (session('success'))
    <x-alert-notification type="success" message="{{session('success')}}"/>
    @endif
@endsection