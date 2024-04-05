<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    @vite('resources/js/app.js')
</head>
<body>

<!-- Konten halaman utama di sini -->

<!-- <footer class="bottom-0 bg-red-300 h-[87px]">

    <div class="flex justify-center h-[392px]">
        <nav>
            <h6>QUICK LINKS</h6>
            <div>
                <a href="">Home</a>
                <a href="">Health Tips Article</a>
                <a href="">FAQ</a>
                <a href="">Contact Us</a>
            </div>
            
        </nav>

    </div>

    <div class="flex justify-center py-[32px]">
        <p class="text-[16px] font-semibold text-[#888888] ">©2024 FarmCare+, All right reserved</p>
    </div>
</footer> -->

<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium ducimus ad quas voluptatem alias sunt accusamus quos odio. Placeat ab debitis asperiores rem, eveniet dolores explicabo nisi dolor laudantium veritatis?</p>
<footer class="relative bottom-0 bg-[#FFF8F0]">

    <div class="h-[37px]"></div>

    <div class="flex justify-center py-[45px] bg-[#F1DEC9] h-[392px]">
            
            <div class="pt-[41.5px] pr-[138px] border-r-2 border-black">
                <h6 class="font-semibold text-[24px] pb-[20px]">QUICK LINKS</h6>
                <ul class="font-medium text-[16px] pb-[8px]">
                    <li class="pb-[8px]"><a href="">Home</a></li>
                    <li class="pb-[8px]"><a href="">Health Tips Article</a></li>
                    <li class="pb-[8px]"><a href="">FAQ</a></li>
                    <li><a href="">Contact Us</a></li>
                </ul>
            </div>

            <div class="pt-[41.5px] pl-[40px] pr-[117px] border-r-2 border-black">
                <h6 class="font-semibold text-[24px] pb-[20px]">OUR SERVICES</h6>
                <ul class="font-medium text-[16px]">
                    <li class="pb-[8px]"><a href="">Consultation</a></li>
                    <li><a href="">Offline Reservation</a></li>
                </ul>
            </div>

            <div class="pt-[41.5px] pl-[40px]">
                <h6 class="font-semibold text-[24px] pb-[20px]">CONTACT US</h6>
                <p class="font-bold text-[16px] pb-[4px]">Email:</p>
                <p class="font-medium text-[16px] pb-[16px]">farmcareplus@gmail.com</p>
                <p class="font-bold text-[16px] pb-[4px]">Address:</p>
                <p class="font-medium text-[16px]">Jl. Telekomunikasi. 1, Terusan<br> Buahbatu - Bojongsoang,<br> Bandung, Jawa Barat</p>
            </div>
    </div>


    <div class="flex justify-center py-[32px]">
        <p class="text-[16px] font-semibold text-[#888888] ">©2024 FarmCare+, All right reserved</p>
    </div>
</footer>

</body>
</html>
