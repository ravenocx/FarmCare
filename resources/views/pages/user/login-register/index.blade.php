<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmCare</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    @vite('resources/js/app.js')
    
</head>
<body>
    <main class="flex font-poppins">
        <div class="w-1/2 h-screen bg-secondaryColor">
            <h1 class="text-primaryColor font-bold text-7xl text-center pt-36 leading-snug">Welcome to <br> FarmCare+</h1>
            <img src="{{asset('images/animal/cow-loginpage.svg')}}" alt="cow-image" class="mx-auto mt-56">
        </div>
        <div class="w-1/2">
            <div class="flex text-2xl h-28 font-bold">
                <button onclick="toggleForm('login')" class="w-1/2 bg-red-200 ">Sign in</button>
                <button onclick="toggleForm('register')" class="w-1/2 bg-gray-200">Sign up</button>
            </div>

            <div id="loginForm" class="login ">
                <div class="mt-10 flex justify-center">
                    <form id="login" action="login.php" method="post" class="flex flex-col">
                        @csrf
                        <label for="email" class="font-medium text-2xl">Email</label>
                        <input id="email" type="email" name="email" placeholder="Enter your email" class="w-[677px] mt-3 h-20 rounded-lg border border-[#8C8F93] border-opacity-50 placeholder:pl-4 placeholder:text-lg" autofocus required>

                        <label for="password" class="font-medium text-2xl mt-6">Password</label>
                        <input id="password" type="password" name="password" placeholder="Enter your password" class="w-[677px] mt-3 h-20 rounded-lg border border-[#8C8F93] border-opacity-50 placeholder:pl-4 placeholder:text-lg" autofocus required>

                        <button type="submit">Sign In</button>
                    </form>
                </div>
                
            </div>

            <div id="registerForm" class="register hidden">
                <form id="login" action="login.php" method="post">
                    @csrf
                    <input type="text" name="email" placeholder="register@gmail.com">
                    <input type="password" name="password" placeholder="Password">
                    <button type="submit">Sign In</button>
                </form>
            </div>
        </div>
    </main>
    
</body>

<script>
    function toggleForm(formType) {
        if (formType === 'register') {
            document.getElementById('loginForm').style.display = 'none';
            document.getElementById('registerForm').style.display = 'block';
        } else {
            document.getElementById('registerForm').style.display = 'none';
            document.getElementById('loginForm').style.display = 'block';
        }
    }
</script>

</html>