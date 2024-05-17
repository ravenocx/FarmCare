@extends('layouts.user.app')

@section('title', 'Farmcare - Home')

@section('main-content')
    <section class="relative bg-secondaryColor pb-14 pl-20 pt-24">
        <h1 class="font-semibold text-4xl mb-6">The Most Comprehensive Animal Health Solution</h1>
        <p class="text-xl mb-7">Chat with doctors with online consultations, visit hospitals with offline reservations and update <br> information Regarding your livestock health, you can do it all at FarmCare+</p>
        <div class="flex">
            <a href="{{route('user.consultation')}}">
                <div class="bg-white rounded-xl px-16 pt-2 pb-4 shadow-lg">
                    <img src="{{asset('images/icon/consultation-icon.svg')}}" class="mx-auto mb-3"/>
                    <p class="text-base font-medium text-center">Online Consultation</p>
                </div>
            </a>

            <a href="">
                <div class="bg-white rounded-xl px-16 pt-2 pb-4 shadow-lg ml-7">
                    <img src="{{asset('images/icon/reservation-icon.svg')}}" class="mx-auto mb-3 size-[200px]"/>
                    <p class="text-base font-medium text-center">Offline Consultation</p>
                </div>
            </a>
        </div>

        <img src="{{asset('images/animal/cow-homepage.svg')}}" alt="cow" class="absolute bottom-8 right-0 h-[340px] ">
    </section>

    <section class="mt-11 mb-16">
        <div class="container mx-auto w-[1149px]">
            <h2 class="font-semibold text-3xl text-center mb-2">Recommendation Doctor For Animal</h2>
            <div class="flex justify-end">
                <a href="" class="mb-4 font-semibold text-shadeBrown text-base"> View All ></a>
            </div>

            <div id="default-carousel" class="relative w-full h-64" data-carousel="slide">
                <div class="relative h-64 overflow-hidden rounded-lg">
                    <div class="flex hidden duration-1000 ease-in-out h-60 pt-4 pl-4" data-carousel-item>
                        @for ($i = 0; $i < 6; $i++)
                        <div class="bg-secondaryColor px-2 pt-2 rounded-lg shadow-lg mr-5">
                            <img src="{{asset('images/assets/doctor-picture.svg')}}" alt="doctor" class="size-[155px]">
                            <p class="font-semibold text-xs my-2">Dr. Haris Sitompul</p>
                            <p class="font-semibold text-xs pb-3">Poultry Specialist</p>
                        </div>
                        @endfor
                    </div>

                    <div class="flex hidden duration-1000 ease-in-out h-60 pt-4 pl-4" data-carousel-item>
                        @for ($i = 0; $i < 6; $i++)
                        <div class="bg-secondaryColor px-2 pt-2 rounded-lg shadow-lg mr-5">
                            <img src="{{asset('images/assets/doctor-picture.svg')}}" alt="doctor" class="size-[155px]">
                            <p class="font-semibold text-xs my-2">Dr. Haris Sitompul</p>
                            <p class="font-semibold text-xs pb-3">Poultry Specialist</p>
                        </div>
                        @endfor
                    </div>

                    <div class="flex hidden duration-1000 ease-in-out h-60 pt-4 pl-4" data-carousel-item>
                        @for ($i = 0; $i < 6; $i++)
                        <div class="bg-secondaryColor px-2 pt-2 rounded-lg shadow-lg mr-5">
                            <img src="{{asset('images/assets/doctor-picture.svg')}}" alt="doctor" class="size-[155px]">
                            <p class="font-semibold text-xs my-2">Dr. Haris Sitompul</p>
                            <p class="font-semibold text-xs pb-3">Poultry Specialist</p>
                        </div>
                        @endfor
                    </div> 
                    
                </div>
                <!-- <div class="absolute z-30 flex -translate-x-1/2 -bottom-1 left-1/2 space-x-3 rtl:space-x-reverse">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                </div> -->

                <button type="button" class="absolute top-0 -start-16 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full ">
                        <img src="{{asset('images/vector/left-sign.svg')}}" alt="left-sign" class="">
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 -end-16 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full">
                        <img src="{{asset('images/vector/right-sign.svg')}}" alt="right-sign">
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>
    </section>
    
    <section class="container mx-auto w-[1149px] pb-16">
        <h2 class="font-semibold text-3xl text-center mb-2">Health Tips Article</h2>
        <div class="flex justify-end">
            <a href="" class="mb-6 font-semibold text-shadeBrown text-base"> View All ></a>
        </div>

        <div class="flex">
            @for ($i = 0; $i < 4; $i++)
            <div class="bg-primaryColor px-2 pt-2 rounded-lg shadow-lg mr-5 max-w-[278px]">
                <img src="{{asset('images/animal/cow-article.svg')}}" alt="doctor" class="w-[270px] h-[151px]">
                <p class="font-medium text-base text-white my-2">Mengenal Penyakit Antraknosa <br> Pada Hewan Ternak Kita</p>
                <p class="bg-shadeCream w-20 text-xs py-1 text-white text-center rounded-xl mb-3">Rabies</p>
                <p class="text-xs pb-6 text-justify text-white">Penyakit ini disebabkan oleh bakteri Clostridium anthracis dan dapat menyerang hewan ternak seperti sapi, .....</p>
            </div>
            @endfor
        </div>
    </section>

    
@endsection