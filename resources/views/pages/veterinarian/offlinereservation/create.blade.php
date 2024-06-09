@extends('layouts.veterinarian.app')

@section('title', 'Veterinarian - Add Offline Reservation')

@section('main-content')
    <a class="flex items-center space-x-2 ml-4" href="{{ url('veterinarian/offline-reservation') }}">
        <img src="{{ asset('images/vector/back-vector.svg') }}">
        <p class="text-base text-primaryColor">Back</p>
    </a>

    <form action="{{ url('veterinarian/create-offline-reservation') }}" method="POST">
        @csrf
        <div class="ml-16 mt-9">
            <h1 class="font-semibold text-2xl mb-11">Make Offline Reservation</h1>

            <div class="rounded-xl border-2 border-shadeCream px-12 py-6 mb-7 font-medium text-xl text-mediumGray">
                <label for="datetime-start">Start</label>
                <br>
                <input type="datetime-local" name="schedule_start" id="datetime-start"
                    class="w-64 rounded-xl border-2 border-shadeCream mt-2 mb-4" autofocus required>

                <br>
                <label for="datetime-end">End</label>
                <br>
                <input type="datetime-local" name="schedule_end" id="datetime-end"
                    class="w-64 rounded-xl border-2 border-shadeCream mt-2 mb-4" autofocus required>

            </div>

            <div class="flex justify-end font-medium text-base text-white space-x-7">
                <button type="submit"
                    class="btn-base bg-[#C8B6A6] rounded py-2 px-5 hover:text-shadeBrown hover:bg-white hover:outline hover:outline-1">Add
                    Offline
                    Schedule</button>
                <button type="reset" class="btn-base bg-[#DF0000] rounded py-2 px-5">Discard</button>
            </div>
        </div>
    </form>

    @if (session('error'))
        <x-alert-notification type="error" message="{{ session('error') }}" />
    @endif

    @if (session('success'))
        <x-alert-notification type="success" message="{{ session('success') }}" />
    @endif

@endsection
