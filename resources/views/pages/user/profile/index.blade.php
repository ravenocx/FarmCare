@extends('layouts.user.app')

@section('title','FarmCare - Profile')

@section('main-content')
    <div class="container">
        <h1>User Profile</h1>
        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <!-- Tambahkan informasi profil lainnya sesuai kebutuhan -->
        <a href="{{ route('user.profile.edit.form') }}" class="btn btn-primary">Edit Profile</a>
    </div>
    
@endsection
