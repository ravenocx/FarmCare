<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

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
        
        <div class="flex items-center justify-center w-full h-full py-24 sm:py-8 px-4">
            <div class="w-full relative flex items-center justify-center">
                <button aria-label="slide backward" class="absolute z-30 left-0 ml-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 cursor-pointer" id="prev">
                    <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
                    <div id="slider" class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-center transition ease-out duration-700">
                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="https://i.ibb.co/fDngH9G/carosel-1.png" alt="black chair and white table" class="object-cover object-center w-full" />
                            <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                                <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 1</h2>
                                <div class="flex h-full items-end pb-6">
                                    <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="https://i.ibb.co/DWrGxX6/carosel-2.png" alt="sitting area" class="object-cover object-center w-full" />
                            <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                                <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                                <div class="flex h-full items-end pb-6">
                                    <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="https://i.ibb.co/tCfVky2/carosel-3.png" alt="sitting area" class="object-cover object-center w-full" />
                            <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                                <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                                <div class="flex h-full items-end pb-6">
                                    <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="https://i.ibb.co/rFsGfr5/carosel-4.png" alt="sitting area" class="object-cover object-center w-full" />
                            <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                                <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                                <div class="flex h-full items-end pb-6">
                                    <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="https://i.ibb.co/fDngH9G/carosel-1.png" alt="black chair and white table" class="object-cover object-center w-full" />
                            <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                                <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                                <div class="flex h-full items-end pb-6">
                                    <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="https://i.ibb.co/DWrGxX6/carosel-2.png" alt="sitting area" class="object-cover object-center w-full" />
                            <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                                <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                                <div class="flex h-full items-end pb-6">
                                    <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                                </div>
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
        <button class="text-[16px] text-semibold text-[#A4907C] text-end mr-10">View All ></button>
        
        <div class="flex items-center justify-center w-full h-full py-24 sm:py-8 px-auto">
            <div class="w-full relative flex items-center justify-center">
                <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
                    <div id="slider" class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-center transition ease-out duration-700">
                        <div class="max-w-[20rem] rounded-lg overflow-hidden bg-[#8D7B68] shadow-lg dark:bg-surface-dark dark:text-white">
                            <div class="relative overflow-hidden bg-cover bg-no-repeat">
                                <img class="w-full h-auto rounded-t-lg" src="{{asset('img\a-3.png')}}" alt="">
                            </div>
                            <div class="p-6">
                                <h3 class="text-lg font-medium text-white text-left text-balance">Mengenal Penyakit Antraknosa Pada Hewan Ternak Kita</h3>
                                <p class="text-base text-justify text-white">Penyakit ini disebabkan oleh bakteri Clostridium anthracis dan dapat menyerang hewan ternak seperti sapi, .....</p>
                            </div>
                        </div>
                        <div class="max-w-[20rem] rounded-lg overflow-hidden bg-[#8D7B68] shadow-lg dark:bg-surface-dark dark:text-white">
                            <div class="relative overflow-hidden bg-cover bg-no-repeat">
                                <img class="w-full h-auto rounded-t-lg" src="{{asset('img\a-3.png')}}" alt="">
                            </div>
                            <div class="p-6">
                                <p class="text-lg font-medium text-white">Mengenal Penyakit Antraknosa Pada Hewan Ternak Kita</p>
                                <p class="text-base text-justify text-white">Penyakit ini disebabkan oleh bakteri Clostridium anthracis dan dapat menyerang hewan ternak seperti sapi, .....</p>
                            </div>
                        </div>
                        <div class="max-w-[20rem] rounded-lg overflow-hidden bg-[#8D7B68] shadow-lg dark:bg-surface-dark dark:text-white">
                            <div class="relative overflow-hidden bg-cover bg-no-repeat">
                                <img class="w-full h-auto rounded-t-lg" src="{{asset('img\a-3.png')}}" alt="">
                            </div>
                            <div class="p-6">
                                <p class="text-lg font-medium text-white">Mengenal Penyakit Antraknosa Pada Hewan Ternak Kita</p>
                                <p class="text-base text-justify text-white">Penyakit ini disebabkan oleh bakteri Clostridium anthracis dan dapat menyerang hewan ternak seperti sapi, .....</p>
                            </div>
                        </div>
                        <div class="max-w-[20rem] rounded-lg bg-[#8D7B68] shadow-lg dark:bg-surface-dark dark:text-white">
                            <div class="relative overflow-hidden bg-cover bg-no-repeat">
                                <img class="w-full h-auto rounded-t-lg" src="{{asset('img\a-3.png')}}" alt="">
                            </div>
                            <div class="p-6">
                                <p class="text-lg font-medium text-white">Mengenal Penyakit Antraknosa Pada Hewan Ternak Kita</p>
                                <p class="text-base text-justify text-white font-light">Penyakit ini disebabkan oleh bakteri Clostridium anthracis dan dapat menyerang hewan ternak seperti sapi, .....</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    </body>
</html>