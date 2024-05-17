@extends('layouts.veterinarian.app')

@section('title' ,'Veterinarian - Online Consultation')

@section('main-content')

<div class="container">
    <h1>Create Schedule</h1>
    @include('pages.veterinarian.offlinereservation.offschedule._form', ['Offschedule' => new App\Models\Offschedule, 'action' => route('offschedule.store'), 'method' => 'POST'])
</div>

@endsection
