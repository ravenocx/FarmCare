@extends('layouts.login-regist.master')

@section('title','FarmCare - Authentication')

@section('main-content')
    <div class="flex flex-col h-screen">
        <div class="flex text-2xl font-bold">
            <button id="loginButton" onclick="toggleForm('login')" class="w-1/2 text-primaryColor border-b-2 border-primaryColor h-24">Sign in</button>
            <button id="registerButton" onclick="toggleForm('register')" class="w-1/2 h-24">Sign up</button>
        </div>

        <div id="loginForm" class="login">
            <div class="mt-10 flex justify-center">
                <form id="login" action="{{route('login.submit')}}" method="post" class="flex flex-col">
                    @csrf
                    <label for="email" class="font-medium text-2xl">Email <span class="text-red-600">*</span></label>
                    <input id="email" type="email" name="email" placeholder="Enter your email" class="w-[677px] mt-3 h-20 rounded-lg border border-[#8C8F93] border-opacity-50 text-lg px-4" autofocus required>

                    <label for="password" class="font-medium text-2xl mt-6">Password <span class="text-red-600">*</span></label>
                    <input id="password" type="password" name="password" placeholder="Enter your password" class="w-[677px] mt-3 h-20 rounded-lg border border-[#8C8F93] border-opacity-50 text-lg px-4" autofocus required>

                    <div class="flex items-center mt-5">
                        <input id="rememberme" type="checkbox" name="rememberme" class="size-4">
                        <label for="rememberme" class="ml-5 font-regular text-xl">Remember me</label>
                    </div>

                    <button type="submit" class="btn w-[677px] rounded-md mt-60 bg-primaryColor text-white font-bold text-2xl h-14 hover:text-primaryColor">Sign In</button>                    
                </form>
            </div>
        </div>

        <div class="flex flex-grow justify-center items-center">
            <div id="registerForm" class="register hidden">
                <div class="flex flex-col items-center">
                    <a href="{{route('user.register.form')}}">
                        <button type="submit" class="btn w-[677px] rounded-md border bg-white border-shadeGray text-mediumGray font-medium text-xl h-14 hover:bg-primaryColor hover:text-white">Sign Up as User</button>
                    </a>
                    <p class="font-medium my-6 mx-auto text-xl text-mediumGray">or</p>

                    <a href="{{route('veterinarian.register.form')}}">
                        <button type="submit" class="btn w-[677px] rounded-md border bg-white border-shadeGray text-mediumGray font-medium text-xl h-14 hover:bg-primaryColor hover:text-white">Sign Up as Veterinarian</button>
                    </a>
                </div>
            </div>
        </div>  
    </div>

    @push('scripts')
        <script>
            function toggleForm(formType) {
                if (formType === 'register') {
                    document.getElementById('loginForm').style.display = 'none';
                    document.getElementById('registerForm').style.display = 'block';
                    document.getElementById('loginButton').classList.remove('border-b-2', 'border-primaryColor' ,'text-primaryColor');
                    document.getElementById('registerButton').classList.add('border-b-2', 'border-primaryColor','text-primaryColor' );
                } else {
                    document.getElementById('registerForm').style.display = 'none';
                    document.getElementById('loginForm').style.display = 'block';
                    document.getElementById('registerButton').classList.remove('border-b-2', 'border-primaryColor','text-primaryColor');
                    document.getElementById('loginButton').classList.add('border-b-2', 'border-primaryColor','text-primaryColor');
                }
            }
        </script>
    @endpush

@endsection



