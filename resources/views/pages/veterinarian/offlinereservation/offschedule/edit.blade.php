@extends('layouts.veterinarian.app')

@section('title', 'Veterinarian - Edit Schedule')

@section('main-content')

<div class="container">
    <h1>Edit Schedule</h1>
    @include('pages.veterinarian.offlinereservation.offschedule._editform', [
        'offschedule' => $offschedule,
        'action' => route('offschedule.update', $offschedule->id),
        
    ])
</div>

@endsection