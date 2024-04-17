<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <link href="./output.css" rel="stylesheet" />
    <style>
      #section1 {
        background: rgb(255, 243, 240);
        background: linear-gradient(
          150deg,
          rgba(255, 243, 240, 1) 0%,
          rgba(239, 225, 209, 1) 100%
        );
      }
    </style>
  </head>
  <body>
    <nav class="px-16 py-8 flex items-center justify-between">
      <ul class="flex items-center gap-x-14 font-semibold">
        <img src="./Images/logo.png" alt="Logo" />
        <li>Home</li>
        <li>Service</li>
        <li>Contact Us</li>
      </ul>
      <div class="flex items-center gap-x-8">
        <button
          class="bg-[#A4907C] text-white border-[#A4907C] px-4 py-1 border-2 rounded-md font-medium"
        >
          Login
        </button>
        <button
          class="text-[#A4907C] border-[#A4907C] border-2 px-4 py-1 rounded-md font-medium"
        >
          Sign Up
        </button>
      </div>
    </nav>
    <section id="section1" style="height: 70vh" class="p-24 flex">
      <div class="w-3/5">
        <h1 class="font-bold text-5xl leading-normal">
          Worry less, love more.<br />Make it easy for your animal to<br />
          get care from a busy life.
        </h1>
        <p class="my-4 text-lg">Choose the service you need</p>
        <div class="flex items-center gap-4">
          <button
            class="bg-[#A4907C] text-white border-[#A4907C] px-6 py-2 border-2 rounded-sm font-medium"
          >
            Consultation
          </button>
          <button
            class="bg-[#A4907C] text-white border-[#A4907C] px-6 py-2 border-2 rounded-sm font-medium"
          >
            Booking
          </button>
        </div>
      </div>
      <div class="w-2/5 relative">
        <img src="./Images/cow.png" alt="" class="absolute -bottom-24" />
      </div>
    </section>
    <section class="px-60 py-16">
      <h1 class="text-center text-3xl font-semibold">Our Service</h1>
      <div class="flex gap-10">
        <div>
          <h1 class="text-xl font-semibold">Online Consultation</h1>
          <p class="my-4">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem
            ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.
          </p>
          <div class="flex items-center text-[#A4907C] gap-3">
            View
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="2"
              stroke="#A4907C"
              class="w-6 h-6"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="m8.25 4.5 7.5 7.5-7.5 7.5"
              />
            </svg>
          </div>
        </div>
        <img src="./Images/ad3ac1c75907ca7572c5473847f9f712 1.png" alt="" />
      </div>
      <hr class="border-[#F1DEC9] my-10" />
      <div class="flex gap-10">
        <img src="./Images/702c3df03370bbb5a8e36f0d56c1e15c 1.png" alt="" />
        <div>
          <h1 class="text-xl font-semibold">Offline Reservation</h1>
          <p class="my-4">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem
            ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.
          </p>
          <div class="flex items-center text-[#A4907C] gap-3">
            View
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="2"
              stroke="#A4907C"
              class="w-6 h-6"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="m8.25 4.5 7.5 7.5-7.5 7.5"
              />
            </svg>
          </div>
        </div>
      </div>
      <hr class="border-[#F1DEC9] my-10" />
    </section>
    <section class="py-16 bg-[#FFF8F0]">
      <h1 class="text-center text-3xl font-semibold">FarmCare+ Articles</h1>
      <div class="flex items-center gap-24 mt-16 pl-52">
        <img src="./Images/9cf7ceead6f19c10bc188a15cf8e542f 1.png" alt="" />
        <div class="w-1/2">
          <h1 class="font-bold text-4xl">
            KEEP YOUR ANIMALS HEALTHY AND STRONG
          </h1>
          <p class="my-5">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem
            ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.
          </p>
          <div class="flex items-center text-[#A4907C] gap-3">
            View All
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="2"
              stroke="#A4907C"
              class="w-6 h-6"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="m8.25 4.5 7.5 7.5-7.5 7.5"
              />
            </svg>
          </div>
        </div>
      </div>
      <div class="flex justify-end gap-24 mt-16">
        <div
          class="flex items-center justify-evenly bg-[#F1DEC9] w-3/5 p-10 rounded-b-3xl rounded-tr-3xl rounded-tl-lg"
        >
          <div class="w-1/2">
            <h1 class="font-bold text-4xl">
              KEEP YOUR ANIMALS HEALTHY AND STRONG
            </h1>
            <p class="my-5">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem
              ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua.
            </p>
            <div class="flex items-center text-[#A4907C] gap-3">
              View All
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="#A4907C"
                class="w-6 h-6"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="m8.25 4.5 7.5 7.5-7.5 7.5"
                />
              </svg>
            </div>
          </div>
          <img src="./Images/9cf7ceead6f19c10bc188a15cf8e542f 1-1.png" alt="" />
        </div>
      </div>
    </section>
    <footer class="bg-[#F1DEC9] py-14 flex justify-center">
      <div class="w-1/6">
        <h1 class="text-lg font-semibold mb-3">QUICK LINKS</h1>
        <ul class="font-medium text-sm">
          <li>Home</li>
          <li>Service</li>
          <li>FAQ</li>
        </ul>
      </div>
      <div class="w-1/6 border-x-2 border-black flex justify-center h-">
        <div>
          <h1 class="text-lg font-semibold mb-3" class="text-left">
            OUR SERVICES
          </h1>
          <ul class="font-medium text-sm">
            <li>Online Consultation</li>
            <li>Offline Reservation</li>
          </ul>
        </div>
      </div>
      <div class="w-1/6 pl-10">
        <h1 class="text-lg font-semibold mb-3">CONTACT US</h1>
        <ul class="font-medium text-sm">
          <li class="mb-3">
            Email:
            <p class="font-normal">petcareplus@gmail.com</p>
          </li>
          <li>
            Address:
            <p class="font-normal">
              Jl. Telekomunikasi. 1, Terusan Buahbatu - Bojongsoang, Bandung,
              Jawa Barat
            </p>
          </li>
        </ul>
      </div>
    </footer>
    <section class="bg-[#FFF8F0] py-7 text-center font-medium text-[#888888]">
      <h1>©2024 FarmCare+, All right reserved</h1>
    </section>
  </body>
</html>
