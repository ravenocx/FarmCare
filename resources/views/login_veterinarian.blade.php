<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(to left, #FFFFFF 50%, #FFF8F0 50%);
}
.text-3xl {
    font-size: 80px;
    font-weight: bold;
    color: #8D7B68;
    text-align: center;
    margin-bottom: 20px;
}


.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #FFF8F0; /* Warna latar belakang utama */
}

.form-container {
    width: 50%; /* Lebar form container sesuaikan dengan kebutuhan */
    padding: 2rem;
    border-radius: 20px;
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
    background-color: #FFFFFF; /* Warna latar belakang putih */
}

.form-group {
    margin-bottom: 20px;
}

.label {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 5px;
}

.input {
    width: 100%;
    padding: 10px;
    border: 1px solid #E5E5E5;
    border-radius: 5px;
    outline: none;
}

.checkbox-group {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
}

.checkbox-label {
    font-size: 16px;
    color: #333333;
}

.forgot-password {
    text-align: right;
    font-size: 16px;
    color: #333333;
}

.button {
    width: 100%;
    padding: 15px 0;
    background-color: #8D7B68;
    color: #FFFFFF;
    font-size: 28px;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    outline: none;
    transition: background-color 0.3s ease;
}

.button:hover {
    background-color: #7C6956;
}

    </style>
</head>
<body class="font-sans antialiased">
    <div class="w-full max-w-md p-8 space-y-4 bg-white rounded-xl shadow-lg">
        <h1 class="text-3xl font-bold text-center">Welcome to FarmCare+</h1>
        <form method="POST" class="space-y-4">
            @csrf
            <div class="flex flex-col">
                <label for="email" class="mb-2 text-sm font-medium">Email:</label>
                <input type="email" id="email" name="email" required class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1">
            </div>
            <div class="flex flex-col">
                <label for="password" class="mb-2 text-sm font-medium">Password:</label>
                <input type="password" id="password" name="password" required class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1">
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="w-4 h-4 text-indigo-600 bg-gray-100 rounded border-gray-300 focus:ring-indigo-500 focus:ring-w-1">
                    <label for="remember" class="ml-2 text-sm text-gray-700 font-medium">Remember me</label>
                </div>
                <a href="#" class="text-sm text-indigo-600 hover:underline">Forgot password?</a>
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-2 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Log in</button>
        </form>
    </div>
</body>
</html>
