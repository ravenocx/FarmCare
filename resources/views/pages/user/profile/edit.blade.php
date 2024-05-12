@extends('layouts.user.app')

@section('title','FarmCare - Profile')

@section('main-content')
<div class="container">
    <h1>Edit Profile</h1>
    <form action="{{ route('user.profile.edit.submit') }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection
