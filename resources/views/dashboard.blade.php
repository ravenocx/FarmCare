<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  @vite('resources/js/app.js')

</head>
    <body>
    <p class="pb-[100px]"></p>

    <div class="pb-[40px]">
        <div class="flex bg-primary_color h-[500px]">
            <!-- Container untuk teks dan card -->
            <div class="flex flex-col justify-center text-left text-[20px] ml-20">
                <p class="pt-[64px] font-bold text-4xl">The Most Comprehensive Animal Health Solution</p>
                <p class="py-[16px]">Chat with doctors with online consultations, visit hospitals with offline reservations and update 
                    <br>information Regarding your livestock health, you can do it all at FarmCare+</p>
                <!-- Grid untuk card -->
                <div class="grid grid-cols-1 grid-rows-1 md:grid-cols-2 gap-x-4 gap-y-4">
                    <div class="rounded-lg bg-white shadow-secondary-1 dark:bg-surface-dark dark:text-white text-surface" style="width: 250px;">
                        <div class="p-4">
                            <img src="{{asset('img\a-1.png')}}" alt="offline reservation" class="mx-auto mb-3">
                            <p class="mb-4 text-base text-center">Online Consultation</p>
                        </div>
                    </div>
                    <div class="rounded-lg bg-white shadow-secondary-1 dark:bg-surface-dark dark:text-white text-surface" style="width: 250px;">
                        <div class="p-4">
                            <img src="{{asset('img\a-2.png')}}" alt="offline reservation" class="mx-auto mb-3">
                            <p class="mb-4 text-base text-center">Offline Reservation</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container untuk foto -->
            <div class="flex justify-end items-end bg-cover bg-end">
                <img src="{{asset('img\Pet-Animal-Care-Logo.png')}}" alt="online consultation" class="mr-10 mb-10">
            </div>
        </div>
    </div>

    <div class="flex flex-col justify-center text-left text-[24px]">
        <p class="pt-[64px] font-bold text-3xl text-center">Recommendation Doctor For Animal</p>
        <button class="text-[20px] text-bold text-[#A4907C] text-end mr-20 pt-4">View All ></button>

        <div class="flex items-center justify-center w-full h-full py-24 sm:py-8 px-4">
            <div class="w-full relative flex items-center justify-center">
                <button aria-label="slide backward" class="absolute z-30 left-0 ml-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 cursor-pointer" id="prev">
                    <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
                    <div id="slider" class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-center transition ease-out duration-700">
                        <div class="max-w-[20rem] h-auto rounded-lg overflow-hidden bg-[#FFF8F0] shadow-lg dark:bg-surface-dark dark:text-white">
                            <div class="relative overflow-hidden bg-cover bg-no-repeat pt-4 pl-3 pr-3 flex justify-center items-center">
                                <img class="w-32 h-32 rounded-t-lg" src="{{asset('img\a-4.png')}}" alt="">
                            </div>
                            <div class="pt-2 pb-3 pl-3 pr-3">
                                <h2 class="text-lg font-semibold text-black text-left text-balance pt-2">Drh. Farhan</h2>
                                <p class="text-base text-justify text-black pt-2">Poultry Specialist</p>
                            </div>
                        </div>
                        <div class="max-w-[20rem] h-auto rounded-lg overflow-hidden bg-[#FFF8F0] shadow-lg dark:bg-surface-dark dark:text-white">
                            <div class="relative overflow-hidden bg-cover bg-no-repeat pt-4 pl-3 pr-3 flex justify-center items-center">
                                <img class="w-32 h-32 rounded-t-lg" src="{{asset('img\a-5.png')}}" alt="">
                            </div>
                            <div class="pt-2 pb-3 pl-3 pr-3">
                                <h2 class="text-lg font-semibold text-black text-left text-balance pt-2">Dr. Putri Nadia</h2>
                                <p class="text-base text-justify text-black pt-2">Cattle Specialist</p>
                            </div>
                        </div>
                        <div class="max-w-[20rem] h-auto rounded-lg overflow-hidden bg-[#FFF8F0] shadow-lg dark:bg-surface-dark dark:text-white">
                            <div class="relative overflow-hidden bg-cover bg-no-repeat pt-4 pl-3 pr-3 flex justify-center items-center">
                                <img class="w-32 h-32 rounded-t-lg" src="{{asset('img\a-6.png')}}" alt="">
                            </div>
                            <div class="pt-2 pb-3 pl-3 pr-3">
                                <h2 class="text-lg font-semibold text-black text-left text-balance pt-2">Dr. Haris Sitompul</h2>
                                <p class="text-base text-justify text-black pt-2">Fish Specialist</p>
                            </div>
                        </div>
                        <div class="max-w-[20rem] h-auto rounded-lg overflow-hidden bg-[#FFF8F0] shadow-lg dark:bg-surface-dark dark:text-white">
                            <div class="relative overflow-hidden bg-cover bg-no-repeat pt-4 pl-3 pr-3 flex justify-center items-center">
                                <img class="w-32 h-32 rounded-t-lg" src="{{asset('img\a-7.png')}}" alt="">
                            </div>
                            <div class="pt-2 pb-3 pl-3 pr-3">
                                <h2 class="text-lg font-semibold text-black text-left text-balance pt-2">Dr. Reihaini</h2>
                                <p class="text-base text-justify text-black pt-2">Fish Specialist</p>
                            </div>
                        </div>
                        <div class="max-w-[20rem] h-auto rounded-lg overflow-hidden bg-[#FFF8F0] shadow-lg dark:bg-surface-dark dark:text-white">
                            <div class="relative overflow-hidden bg-cover bg-no-repeat pt-4 pl-3 pr-3 flex justify-center items-center">
                                <img class="w-32 h-32 rounded-t-lg" src="{{asset('img\a-8.png')}}" alt="">
                            </div>
                            <div class="pt-2 pb-3 pl-3 pr-3">
                                <h2 class="text-lg font-semibold text-black text-left text-balance pt-2">Dr. Fajar</h2>
                                <p class="text-base font-medium text-justify text-black pt-2">Cattle Specialist</p>
                            </div>
                        </div>
                        <div class="max-w-[20rem] h-auto rounded-lg overflow-hidden bg-[#FFF8F0] shadow-lg dark:bg-surface-dark dark:text-white">
                            <div class="relative overflow-hidden bg-cover bg-no-repeat pt-4 pl-3 pr-3 flex justify-center items-center">
                                <img class="w-32 h-32 rounded-t-lg" src="{{asset('img\a-9.png')}}" alt="">
                            </div>
                            <div class="pt-2 pb-3 pl-3 pr-3">
                                <h2 class="text-lg font-semibold text-black text-left text-balance pt-2">Dr. Azka</h2>
                                <p class="text-base text-justify text-black pt-2">Poultry Specialist</p>
                            </div>
                        </div>
                    </div>
                </div>
                <button aria-label="slide forward" class="absolute z-30 right-0 mr-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400" id="next">
                    <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="flex flex-col justify-center text-left text-[24px]">
        <p class="pt-[64px] font-bold text-3xl text-center">Article About Livestock</p>
        <button class="text-[20px] text-bold text-[#A4907C] text-end mr-20 pt-4">View All ></button>
        
        <div class="flex items-center justify-center w-full h-full py-24 sm:py-8 px-auto">
            <div class="w-full relative flex items-center justify-center">
                <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
                    <div id="slider" class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-center transition ease-out duration-700">
                        <div class="max-w-[20rem] rounded-lg overflow-hidden bg-[#8D7B68] shadow-lg dark:bg-surface-dark dark:text-white">
                            <div class="relative overflow-hidden bg-cover bg-no-repeat pt-4 pl-3 pr-3">
                                <img class="w-full h-auto rounded-t-lg" src="{{asset('img\a-3.png')}}" alt="">
                            </div>
                            <div class="pt-2 pb-3 pl-3 pr-3">
                                <h2 class="text-lg font-medium text-white text-left text-balance pb-2">Mengenal Penyakit Antraknosa Pada Hewan Ternak Kita</h2>
                                <button class="bg-[#F1DEC9] text-extrabold text-sm text-white rounded-3xl py-1 px-3 p-2">Rabies</button>
                                <p class="text-base text-justify text-white pt-2 pb-2">Penyakit ini disebabkan oleh bakteri Clostridium anthracis dan dapat menyerang hewan ternak seperti sapi, .....</p>
                            </div>
                        </div>
                        <div class="max-w-[20rem] rounded-lg overflow-hidden bg-[#8D7B68] shadow-lg dark:bg-surface-dark dark:text-white">
                            <div class="relative overflow-hidden bg-cover bg-no-repeat pt-4 pl-3 pr-3">
                                <img class="w-full h-auto rounded-t-lg" src="{{asset('img\a-3.png')}}" alt="">
                            </div>
                            <div class="pt-2 pb-3 pl-3 pr-3">
                                <h2 class="text-lg font-medium text-white text-left text-balance pb-2">Mengenal Penyakit Antraknosa Pada Hewan Ternak Kita</h2>
                                <button class="bg-[#F1DEC9] text-extrabold text-sm text-white rounded-3xl py-1 px-3 p-2">Rabies</button>
                                <p class="text-base text-justify text-white pt-2 pb-2">Penyakit ini disebabkan oleh bakteri Clostridium anthracis dan dapat menyerang hewan ternak seperti sapi, .....</p>
                            </div>
                        </div>
                        <div class="max-w-[20rem] rounded-lg overflow-hidden bg-[#8D7B68] shadow-lg dark:bg-surface-dark dark:text-white">
                            <div class="relative overflow-hidden bg-cover bg-no-repeat pt-4 pl-3 pr-3">
                                <img class="w-full h-auto rounded-t-lg" src="{{asset('img\a-3.png')}}" alt="">
                            </div>
                            <div class="pt-2 pb-3 pl-3 pr-3">
                                <h2 class="text-lg font-medium text-white text-left text-balance pb-2">Mengenal Penyakit Antraknosa Pada Hewan Ternak Kita</h2>
                                <button class="bg-[#F1DEC9] text-extrabold text-sm text-white rounded-3xl py-1 px-3 p-2">Rabies</button>
                                <p class="text-base text-justify text-white pt-2 pb-2">Penyakit ini disebabkan oleh bakteri Clostridium anthracis dan dapat menyerang hewan ternak seperti sapi, .....</p>
                            </div>
                        </div>
                        <div class="max-w-[20rem] rounded-lg overflow-hidden bg-[#8D7B68] shadow-lg dark:bg-surface-dark dark:text-white">
                            <div class="relative overflow-hidden bg-cover bg-no-repeat pt-4 pl-3 pr-3">
                                <img class="w-full h-auto rounded-t-lg" src="{{asset('img\a-3.png')}}" alt="">
                            </div>
                            <div class="pt-2 pb-3 pl-3 pr-3">
                                <h2 class="text-lg font-medium text-white text-left text-balance pb-2">Mengenal Penyakit Antraknosa Pada Hewan Ternak Kita</h2>
                                <button class="bg-[#F1DEC9] text-extrabold text-sm text-white rounded-3xl py-1 px-3 p-2">Rabies</button>
                                <p class="text-base text-justify text-white pt-2 pb-2">Penyakit ini disebabkan oleh bakteri Clostridium anthracis dan dapat menyerang hewan ternak seperti sapi, .....</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    </body>
</html>