@extends('layouts.veterinarian.app')

@section('title' ,'Veterinarian - Offline Consultation')

@section('main-content')
<div class="container">
    <h2>Jadwal Offline Reservation Dokter Hewan</h2>
    <a href="{{ route('offschedule.create') }}" class="btn btn-primary mb-2">Tambah Jadwal</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID Jadwal</th>
                <th>Specialist</th>
                <th>Tanggal</th>
                <th>Sesi</th>
                <th>Price</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($offschedules as $offschedule)
            <tr>
                <td>{{ $offschedule->id }}</td>
                <td>{{ $offschedule->veterinarian->specialist }}</td>
                <td>{{ $offschedule->date }}</td>
                <td>{{ $offschedule->session }}</td>
                <td>{{ $offschedule->veterinarian->reservation_price }}</td>
                <td>{{ $offschedule->status }}</td>
                <td>
                    <a href="{{ url('veterinarian/offschedule/'.$offschedule->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ url('veterinarian/offschedule/'.$offschedule->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection