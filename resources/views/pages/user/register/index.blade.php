@extends('layouts.login-regist.master')

@section('title','FarmCare - Sign Up as a User')

@section('main-content')
    <div class="flex flex-col h-screen">
        <div class="flex text-2xl font-bold">
            <a href="{{route('login.form')}}" class="w-1/2 flex justify-center items-center h-24">Sign In</a>
            <a href="" class="w-1/2 text-primaryColor border-b-2 border-primaryColor flex justify-center items-center h-24">Sign Up</a>
        </div>

        <div id="registerForm" class="register">
            <div class="mt-10 flex justify-center">
                <form id="register" method="POST" action="{{route('user.register.submit')}}"  class="flex flex-col">
                    @csrf
                    <label for="fullName" class="font-medium text-2xl">Full Name <span class="text-red-600">*</span></label>
                    <input id="fullName" type="text" name="fullName" placeholder="Enter your name" class="w-[677px] mt-3 h-20 rounded-lg border border-shadeGray border-opacity-50 text-lg px-4" autofocus required >

                    <label for="phoneNumber" class="font-medium text-2xl mt-6">Phone Number <span class="text-red-600">*</span></label>
                    <input id="phoneNumber" type="tel" name="phoneNumber" placeholder="Enter your phone number" class="w-[677px] mt-3 h-20 rounded-lg border border-shadeGray border-opacity-50 text-lg px-4" autofocus required>

                    <label for="email" class="font-medium text-2xl mt-6">Email <span class="text-red-600">*</span></label>
                    <input id="email" type="email" name="email" placeholder="Enter your email" class="w-[677px] mt-3 h-20 rounded-lg border border-shadeGray border-opacity-50 text-lg px-4" autofocus required>

                    <div class="flex w-[677px] mt-6">
                        <div class="max-w-80">
                            <label for="password" class="font-medium text-2xl">Password <span class="text-red-600">*</span></label>
                            <input id="password" type="password" name="password" placeholder="Enter your password" class="w-80 mt-3 h-20 rounded-lg border border-shadeGray border-opacity-50 text-lg px-4" autofocus required>
                        </div>

                        <div class="max-w-80 ml-[37px]">
                            <label for="password_confirmation" class="font-medium text-2xl">Confirm Password <span class="text-red-600">*</span></label>
                            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Retype your password" class="w-80 mt-3 h-20 rounded-lg border border-shadeGray border-opacity-50 text-lg px-4" autofocus required>
                        </div>
                    </div>
                    <button type="submit" class="btn w-[677px] rounded-md mt-8 bg-primaryColor text-white font-bold text-2xl h-14 hover:text-primaryColor">Sign Up</button>                    

                </form>
            </div>
        </div>

        @if(session('error'))
        <div role="alert" class="alert">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span>{{session('error')}}</span>
        </div>
        @endif
    </div>

@endsection



