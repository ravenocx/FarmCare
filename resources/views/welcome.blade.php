@extends('layouts.user.app')

@section('title', 'Farmcare')

@section('main-content')
    <section class="relative bg-gradient-to-br from-[#FFF8F0] to-[#EFE1D1] py-24 pl-24">
        <h1 class="font-bold text-5xl leading-normal">Worry less, love more! <br> Make it easy for your animal to <br> get care from a busy life.</h1>
        <p class="text-2xl mt-5 mb-10">Choose the service you need</p>
        <div class="flex">
            <a href="{{route('user.consultation')}}">
                <button class="btn h-14 px-5 py-4 mr-5 rounded-md bg-shadeBrown text-white font-bold text-base hover:text-shadeBrown hover:bg-white">Consultation</button>
            </a>
            <a href="{{route('login.form')}}">
                <button class="btn h-14 px-10 py-4 rounded-md bg-shadeBrown text-white font-bold text-base hover:text-shadeBrown hover:bg-white">Booking</button>
            </a>
        </div>

        <div class="absolute bottom-0 right-0">
            <img src="{{asset('images/animal/cow-landingpage.svg')}}" alt="">
        </div>
    </section>

    <section class="px-60 pt-14 pb-24">
        <h2 class="text-3xl font-semibold text-center">Our Service</h2>

        <div class="hero mt-10">
            <div class="hero-content flex-col lg:flex-row-reverse p-0 pb-6 border-b-2 border-shadeCream">
            <img src="{{asset('images/icon/consultation-icon.svg')}}" class="ml-16" />
                <div>
                    <h3 class="text-2xl font-semibold">Online Consultation</h3>
                    <p class="py-4">The online consultation feature with a veterinarian helps farmers to get 
          an initial diagnosis and treatment suggestions based on complaints or information 
          provided by the farmer. Then, the veterinarian can also provide recommendations 
          for further action, such as medication or direct visits to the clinic if necessary</p>
                    <a href="{{route('user.consultation')}}" class="text-base font-medium text-shadeBrown">View ></a>    
                </div>
            </div>
        </div>

        <div class="hero pt-6">
            <div class="hero-content flex-col lg:flex-row p-0 pb-6 border-b-2 border-shadeCream">
            <img src="{{asset('images/icon/reservation-icon.svg')}}" class="mr-16" />
                <div>
                    <h3 class="text-2xl font-semibold">Offline Reservation</h3>
                    <p class="py-4">A service for making reservations or appointments with veterinarians offline, 
          where farmers do not need to travel far to a veterinary clinic to get health care 
          and care for livestock. A veterinarian will visit the farm location to carry out medical 
          treatment. Farmers can also choose a specialist or doctor that suits their needs and farm location.</p>
                    <a href="{{route('user.consultation')}}" class="text-base font-medium text-shadeBrown">View ></a>    
                </div>
            </div>
        </div>
    </section >
        
        
    <section>
        <div class="bg-secondaryColor">
            <h2 class="text-3xl font-semibold text-center mt-14 py-6">FarmCare+ Articles</h2> 

            <div class="hero justify-start pl-48">
                <div class="hero-content flex-col lg:flex-row p-0 my-14">
                <img src="{{asset('images/animal/article-img.svg')}}" class="mr-16" />
                    <div class="pb-8">
                        <h3 class="text-3xl font-semibold">For Farmers, This is How to Keep <br> Cows Healthy During the Dry <br> Season</h3>
                        <p class="my-5 text-base">Lampung Province, as a livestock center, will have a cattle <br> population of 906,568 in 2022, a goat population of 1.67 <br> million in 2022, a population of 103,657,519 broiler chickens, <br> and 14,501,073 laying hens in 2022. </p>
                        <a href="{{route('user.consultation')}}" class="text-base font-bold text-shadeBrown">View All ></a>    
                    </div>
                </div>
            </div>

            <div class="hero justify-end">
                <div class="hero-content flex-col lg:flex-row-reverse p-0 bg-shadeCream py-10 pl-16 pr-48 rounded-2xl">
                <img src="{{asset('images/animal/article-img2.svg')}}" class="ml-16" />
                    <div class="pb-8">
                        <h3 class="text-3xl font-semibold">Tips for Maintaining Biofloc Tilapia <br> So They Are Healthy and Don't Die <br> Easily</h3>
                        <p class="my-5 text-base">According to the efishery page, Biofloc comes from <br> the words "bios" which means life, and "floc" which means lump.<br> Biofloc itself is a fish cultivation system using environmental <br> engineering techniques. This technique relies on oxygen <br> supply and the use of microorganisms.</p>
                        <a href="{{route('user.consultation')}}" class="text-base font-bold text-shadeBrown">View All ></a>    
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection