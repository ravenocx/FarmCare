@extends('layouts.login-regist.master')

@section('title','FarmCare - Sign Up as a User')

@section('main-content')
    <div class="flex flex-col h-screen">
        <div class="flex text-2xl h-24 font-bold">
            <a href="{{route('login')}}" class="w-1/2 flex justify-center items-center">Sign In</a>
            <a href="" class="w-1/2 text-primaryColor border-b-2 border-primaryColor flex justify-center items-center">Sign Up</a>
        </div>

        <div id="registerForm" class="register">
            <div class="mt-10 flex justify-center">
                <form id="register" action="register.php" method="post" class="flex flex-col">
                    @csrf
                    <label for="email" class="font-medium text-2xl">Email <span class="text-red-600">*</span></label>
                    <input id="email" type="email" name="email" placeholder="Enter your email" class="w-[677px] mt-3 h-20 rounded-lg border border-[#8C8F93] border-opacity-50 text-lg px-4" autofocus required>

                    <label for="password" class="font-medium text-2xl mt-6">Password <span class="text-red-600">*</span></label>
                    <input id="password" type="password" name="password" placeholder="Enter your password" class="w-[677px] mt-3 h-20 rounded-lg border border-[#8C8F93] border-opacity-50 text-lg px-4" autofocus required>

                    <!-- TODO : Remember me -->
                    <div class="flex items-center mt-5">
                        <input id="rememberme" type="checkbox" name="rememberme" class="size-4">
                        <label for="rememberme" class="ml-5 font-regular text-xl">Remember me</label>
                    </div>

                    <button type="submit" class="w-[677px] rounded-md mt-[436px] bg-primaryColor text-white font-bold text-2xl py-3.5">Sign In</button>
                </form>
            </div>
        </div>
  
    </div>

@endsection



