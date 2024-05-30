@extends('layouts.veterinarian.app')

@section('title', 'Veterinarian - Online Consultation Schedule')

@section('main-content')
    <a class="flex items-center space-x-2 ml-4" href="{{route('veterinarian.consultation')}}">
        <img src="{{asset('images/vector/back-vector.svg')}}" >
        <p class="text-base text-primaryColor">Back</p>
    </a>

    <div class="ml-16 mt-9">
        <h1 class="font-semibold text-2xl mb-7">Online Consultation Schedule</h1>

        <div class="grid grid-cols-3">
            @foreach($serviceSchedules as $index => $serviceSchedule)
            <div class=" border-b-2 border-shadeCream py-4">
                <div class="flex">
                    <div class="{{ $index % 3 == 0 ? ($index === count($serviceSchedules)- 1 ? '' : 'pr-6 border-r-2') : (($index + 1) % 3 == 0  ? 'pl-6' : 'px-6 border-r-2') }}  border-shadeCream">
                        <div class="flex text-sm">
                            <img src="{{Auth::guard('veterinarian')->user()->photo ? : asset('images/assets/vet-schedule-image.svg')}}" class="rounded-lg border border-shadeBrown w-[150px] h-28">
                            <div class="w-[224.22px] ml-2 space-y-2">
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

                                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="btn-base bg-[#DF0000] font-bold text-xs text-white rounded py-2 px-3 hover:text-[#DF0000] hover:bg-white hover:outline hover:outline-1" type="button">
                                    Cancel
                                </button>
                            @else
                                <button class="btn-base bg-gray-300 text-xs font-bold text-white rounded py-2 px-5 cursor-not-allowed" disabled>Schedule Ended</button>
                            
                            @endif
                        </div>
                    </div>
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
        </div>
        <div class="mt-16 pb-10">
            <!-- {{$serviceSchedules->links()}} -->

            {{ $serviceSchedules->links('vendor.pagination.tailwind') }}
        </div>
    </div>

    

    @if (session('error'))
    <x-alert-notification type="error" message="{{session('error')}}"/>
    @endif

    @if (session('success'))
    <x-alert-notification type="success" message="{{session('success')}}"/>
    @endif
@endsection