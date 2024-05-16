<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Footer</title>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  @vite('resources/js/app.js')
  <style>
  .divider {
    border-right: 2px solid #000000;
  }
  
  footer.bg-yellow-100 {
    background-color: #F1DEC9;
  }
</style>

</head>
<body>

<footer class="bg-yellow-100 p-4">
  <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
    <div class="md:col-span-1 md:border-l md:border-r divider">
      <h3 class="font-bold">QUICK LINKS</h3>
      <ul class="list-none">
        <li><a href="#" class="text-blue-600 hover:underline">Home</a></li>
        <li><a href="#" class="text-blue-600 hover:underline">FAQ</a></li>
      </ul>
    </div>
    <div class="md:col-span-1 md:border-l md:border-r divider">
      <h3 class="font-bold">OUR SERVICES</h3>
      <ul class="list-none">
        <li><a href="#" class="text-blue-600 hover:underline">Online Consultation</a></li>
        <li><a href="#" class="text-blue-600 hover:underline">Offline Reservation</a></li>
        <li><a href="#" class="text-blue-600 hover:underline">Article</a></li>
      </ul>
    </div>
    <div class="md:col-span-1 md:pl-4">
      <h3 class="font-bold">CONTACT US</h3>
      <p>Email: <a href="mailto:petcareplus@gmail.com" class="text-blue-600 hover:underline">petcareplus@gmail.com</a></p>
      <p>Address: Jl. Telekomunikasi. 1, Terusan Buahbatu - Bojongsoang, Bandung, Jawa Barat</p>
    </div>
  </div>
</footer>

</body>
</html>

</body>
</html>