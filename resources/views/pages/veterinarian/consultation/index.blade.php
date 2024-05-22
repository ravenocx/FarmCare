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
        <a href="{{route('veterinarian.consultation.schedule')}}" class="font-semibold text-shadeBrown text-base"> View All ></a>
    </div>

    <section class="flex justify-center pb-5 border-b-2 border-shadeCream mb-5">
        @foreach($serviceSchedules as $index => $serviceSchedule)
            <div class="{{ $index == 0 ? (count($serviceSchedules) === 1 ? '' : 'pr-6 border-r-2') : ($index == 1 ? 'px-6 border-r-2' : 'pl-6') }}  border-shadeCream">
                <div class="flex text-xs">
                    <img src="{{Auth::guard('veterinarian')->user()->photo ? : asset('images/assets/vet-schedule-image.svg')}}" class="rounded-lg border border-shadeBrown w-[150px] h-28">
                    <div class="ml-2 space-y-2">
                        <p class="font-bold">{{(Auth::guard('veterinarian')->user()->gender == 'male' ? 'Dr.' :'Dra.') . Auth::guard('veterinarian')->user()->name}}</p>
                        <p class="font-bold">Online Consultation</p>
                        <p class="text-[#FF0000]">{{ Carbon\Carbon::parse($serviceSchedule->schedule_start)->format('d/m/Y') }} {{ Carbon\Carbon::parse($serviceSchedule->schedule_start)->format('H:i') }} - {{ Carbon\Carbon::parse($serviceSchedule->schedule_end)->format('H:i') }}</p>
                        @if($serviceSchedule->is_reserved)
                            <p class="text-green-800">Reserved</p>
                        @else
                            <p class="text-yellow-400">Not Reserved</p>
                        @endif
                    </div>
                </div>
        
                <div class="flex justify-center mt-5 space-x-3">
                    @if(Carbon\Carbon::parse($serviceSchedule->schedule_end)->isAfter(Carbon\Carbon::now()))
                        <a href="{{route('veterinarian.consultation.schedule.edit' , ['id' => $serviceSchedule -> id])}}">
                            <button class="btn-base bg-shadeBrown font-bold text-xs text-white rounded py-2 px-5 hover:text-shadeBrown hover:bg-white hover:outline hover:outline-1">Edit</button>
                        </a>
                        <a href="{{route('veterinarian.consultation.schedule.delete', ['id' =>$serviceSchedule -> id ])}}">
                            <button class="btn-base bg-[#DF0000] font-bold text-xs text-white rounded py-2 px-3">Cancel</button>
                        </a>
                    @else
                        <button class="btn-base bg-gray-300 text-xs font-bold text-white rounded py-2 px-5 cursor-not-allowed" disabled>Schedule Ended</button>
                    
                    @endif
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
                        <th>
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
                        <td class="px-6 py-3 flex justify-center">
                            <select id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>{{$order -> order_status}}</option>
                                <option value="Completed">Completed</option>
                                <option value="Cancel">Cancel</option>
                            </select>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </section>


    @if (session('error'))
    <x-alert-notification type="error" message="{{session('error')}}"/>
    @endif

    @if (session('success'))
    <x-alert-notification type="success" message="{{session('success')}}"/>
    @endif
@endsection