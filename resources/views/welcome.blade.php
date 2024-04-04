<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="{{ asset('assets/logofarm.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Dashboard</title>

    <style>
        /* Menambahkan aturan CSS untuk kelas custom-text */
        .custom-text {
            font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins */
            font-size: 20px; /* Ukuran font 20px */
        }
        .customt1{
            font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins */
            font-size: 16px; /* Ukuran font 16px */
        }
    </style>
        
    <style>
        /* Menambahkan aturan CSS untuk kelas custom-heading */
        .custom-h1 {
            font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins */
            font-size: 48px; /* Ukuran font 48px */
            font-weight: bold;
        }
        .custom-h2 {
            font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins */
            font-size: 48px; /* Ukuran font 48px */
            font-weight: bold;
            text-align: center;
        }
    </style>
    <style>
        /* Aturan CSS untuk tombol brown */
        .btn-brown {
            background-color: #A4907C; /* Ganti warna latar belakang sesuai kebutuhan */
            color: #fff; /* Warna teks putih */
        }
        .btn-primary {
        font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins */
        font-size: 12px; /* Ukuran font 12px */
        background-color: #A4907C; /* Ganti warna latar belakang sesuai kebutuhan */
        color: #fff; /* Warna teks putih */
        border: 2px solid #C8B6A6; /* Garis tepi berwarna C8B6A6 */
        }
        .btn-sign-up {
            /* Gaya untuk tombol Sign Up */
            background-color: #fff; /* Latar belakang putih */
            color: #C8B6A6; /* Warna teks */
            border: 2px solid #C8B6A6; /* Garis tepi berwarna C8B6A6 */
            padding: 10px 20px; /* Padding */
            border-radius: 4px; /* Sudut border */
            text-decoration: none; /* Menghapus dekorasi teks default (underline) */
            font-family: 'Poppins', sans-serif; /* Font Poppins */
            font-size: 16px; /* Ukuran font 16px */
            font-weight: thin; /* Ketebalan teks */
            transition: background-color 0.3s, color 0.3s, border-color 0.3s; /* Transisi perubahan warna */
            cursor: pointer; /* Kursor menjadi pointer saat dihover */
        }
        .btn-sign-up:hover {
            /* Gaya saat tombol dihover */
            background-color: #C8B6A6; /* Latar belakang berubah menjadi C8B6A6 */
            color: #fff; /* Warna teks berubah menjadi putih */
        }
    </style>
    <style>
        body {
        font-family: Poppins, sans-serif;
        margin: 0;
        padding: 0;
        }
        .container {
        width: 950px;
        max-width: 1000px;
        margin: 0 auto;
        }
        .service-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        }

        @media (max-width: 950px) {
        .service-section {
        flex-direction: row;
        flex-wrap: wrap;
            }
        }
        .service-item {
          width: 50%;
          padding: 20px;
          border: 1px solid #ddd;
          margin-bottom: 20px;
        }
        .service-item h2 {
          font-size: 24px;
          margin-bottom: 10px;
        }
        .service-item p {
          margin-bottom: 20px;
        }
        .service-item a {
          text-decoration: none;
          color: #000;
          font-weight: bold;
        }
        .service-item a:hover {
          text-decoration: underline;
        }
        .service-item img {
        width: 100px;
        height: 100px;
        }
    </style>
</head>

<body class="bg-black-50">

    <!-- navbar -->
    <div class="navbar bg-base-100">
  <div class="navbar-start">
    <div class="dropdown">
      <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
      </div>
      <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
        <li><a>Home</a></li>
        <li>
          <a>Service</a>
          <ul class="p-2">
            <li><a>Consultation</a></li>
            <li><a>Booking</a></li>
          </ul>
        </li>
        <li><a>Contact Us</a></li>
      </ul>
    </div>
    <img src="{{ asset('Images/logofarm.png') }}" alt="FarmCare+" class="btn btn-ghost text-xl">
  </div>
  <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal px-1">
      <li><a>Home</a></li>
      <li>
        <details>
          <summary>Service</summary>
          <ul class="p-2">
            <li><a>Consultation</a></li>
            <li><a>Booking</a></li>
          </ul>
        </details>
      </li>
      <li><a>Contact Us</a></li>
    </ul>
  </div>
  <div class="navbar-end">
  <a class="btn btn-primary text-white" href="#">Login</a>
  <a class="btn btn-primary text-white" href="#" style="margin-left: 10px;">Sign Up</a>
  </div>
</div>
    <!-- navbar end -->
    
    <!-- HERO -->
    <div class="hero min-h-screen bg-F1DEC9">
        <div class="hero-content flex">
            <div>
                <h1 class="text-5xl font-bold text-gray-700 custom-h1">Worry less, love more.<br> Make it easy for your animal to get care from a busy life.</h1>
                <p class="py-6 text-black-600 custom-text">Choose the service you need</p>
                <a class="btn btn-primary text-white" style="margin-top: 10px;">Consultation</a>
                <a class="btn btn-primary text-white" style="margin-top: 10px;">Booking</a>
            </div>
            <img src="{{ asset('Images/sapi.jpg') }}" width="300" height="200"/>
        </div>
    </div>
    <!-- HERO END -->
    
    <div class="title text-center mt-4 mb-4">
        <h1 class="text-3xl font-bold text-gray-700 custom-h2">Our Services</h1>
    </div>
    
    <!-- Card Service-->
<div class="container">
    <div class="service-section">
        <div class="service-item">
            <h2>Offline Reservation</h2>
            <img src="{{asset('Images/sapi.jpg')}}" alt="Offline Reservation"  style="float: left; margin-right: 20px;" >
            <p>The offline reservation on FarmCare+ simplifies the process for farmers to book visits from 
                veterinary doctors to their locations. Through the search form at the top of the page, users can 
                search for veterinary doctors based on location and specialization. Below the page, a reservation 
                form allows users to input details such as name, telephone number, type of livestock, and preferred 
                visit schedule. Additionally, there is brief information about the selected veterinary doctor, including 
                a photo, pricing, and specialization, aiding users in making informed decisions. All of this aims to provide 
                efficient and convenient reservation services for farmers, eliminating the need to visit a veterinary clinic 
                in person.</p>
            <a href="#">View >></a>
        </div>

        <div class="service-item">
            <h2>Online Consultation</h2>
            <img src="{{asset('Images/sapi.jpg')}}" alt="Online Consultation" style="float: left; margin-right: 20px;">
            <p>The Online Consultation feature on FarmCare+ provides an efficient solution for farmers in 
                caring for their livestock. This service enables users to quickly consult with veterinary doctors 
                online, overcoming the challenges of busy schedules or difficulty in visiting health services. With 
                easy and affordable access, users can receive advice, diagnoses, and proper treatment to maintain the 
                    health and well-being of their beloved animals.</p>
            <a href="#">View >></a>
        </div>
    </div>
</div>
    <!-- Card Service -->
    
    <div class="title text-center mt-4 mb-4">
        <h1 class="text-3xl font-bold text-gray-700 custom-h2">FarmCare+ Articles</h1>
    </div>
    
    <!-- Card Article -->

    <!-- Card Article -->
    
    <!-- footer -->
<footer class="footer p-10 bg-base-200 text-base-content">
  <aside>
    <img src="{{asset('Images/logofarm.png')}}" alt="Online Consultation" width="200" height="200"</img>
    <p>FarmCare+ Industries Ltd.<br/>Providing Reliable Tech Since 2024</p>
    <p>Address:</p>
    <p>Jl. Telekomunikasi. 1, Terusan Buahbatu - Bojongsoang, Telkom University,<br> Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40257</p>
  </aside> 
  <nav>
    <header class="footer-title">Services</header> 
    <a class="link link-hover">Online Consultation</a>
    <a class="link link-hover">Offline Reservation</a>
  </nav> 
  <nav>
    <header class="footer-title">Company</header> 
    <a class="link link-hover">About us</a>
    <a class="link link-hover">Contact</a>
  </nav> 
  <nav>
    <header class="footer-title">Legal</header> 
    <a class="link link-hover">Terms of use</a>
    <a class="link link-hover">Privacy policy</a>
    <a class="link link-hover">Cookie policy</a>
  </nav>
</footer>
    </footer>
    <footer class="footer footer-center p-4 bg-base-300 text-base-content">
    <aside>
        <p>Copyright © 2024 - FarmCare+, All right reserved</p>
    </aside>
    </footer>
</body>

</html>
