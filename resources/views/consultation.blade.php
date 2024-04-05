<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmCare - Online Consultation</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    @vite('resources/js/app.js')
</head>
<body>

    <!--Put the header in here-->
    @include('components.header-component', [
            'userName' => $userName
    ])

    @include('components.breadcrumbs', [
            'breadcrumbs' => $breadcrumbs
    ])


    <div class="pb-[40px] pt-[18px]">
        <div class="flex justify-center bg-primary_color h-[539px]">
            <div class="text-center text-[24px]">
                <p class="pt-[32px] font-bold">Consult with a doctor at FarmCare+</p>
                <p class="py-[16px]">Telemedicine services are ready to help care for your <br>livestock animals</p>
                <img src="{{asset('images/consultation-desc-image.png')}}" alt="online consultation" class="pt-[10px] mx-auto">
            </div>
        </div>
    </div>
    

    <div class="flex  border-y-2">
        <div class="pl-[96px]  pr-[40px] py-[43px] ">
            <p class="text-[20px] font-medium">Why consult a doctor at FarmCare+?</p>
            <ol class="list-decimal">
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
            </ol>
        </div>

        <div class="flex-grow border-l-2 pl-[48px] pr-[91px] pt-[26px] pb-[56px]">
            <p class="font-bold text-[24px]">Doctor’s Recommendation</p>
            <p class="font-medium text-[16px] pt-[8px] pb-[16px]">Consult with our best doctor’s</p>
            
            <div class="flex">
                <div class="border-r-2 border-[#F1DEC9] pr-[24px] py-[20.5px]">
                    <x-consulservice
                        doctorImage="images/temp-doctor.png" 
                        alt="dokter_image" 
                        name="Drh. Putri Nadia Lumbantoruan" 
                        specialist="Cattle Specialist" 
                        experience="4 Tahun"
                        price="Rp 90.000"
                    />
                </div>

                <div class="px-[24px] py-[20.5px]">
                <x-consulservice
                    doctorImage="images/temp-doctor.png" 
                    alt="dokter_image" 
                    name="Drh. Putri Nadia Lumbantoruan" 
                    specialist="Cattle Specialist" 
                    experience="4 Tahun"
                    price="Rp 90.000"
                />
                </div>

                <!-- <div class="px-[24px] py-[20.5px]">
                    <x-consulservice
                        doctorImage="images/temp-doctor.png" 
                        alt="dokter_image" 
                        name="Drh. Putri Nadia Lumbantoruan" 
                        specialist="Cattle Specialist" 
                        experience="4 Tahun"
                        price="Rp 90.000"
                    />
                </div> -->
                
            </div>
        </div>
    </div>

    <div class="flex justify-center pt-[38px] ">
        <div class="border-b-2 border-[#F1DEC9]">
            <div class="relative">
                <input class="w-[1200px] h-[74px] pl-[44px] py-[22px] border border-[#B8B8B8] rounded-[8px]"type="text" name="doctor_search" id="doctor_search" placeholder="Search for a doctor or specialty">
                    <div class="absolute inset-y-0 right-0 pr-[42.68px] flex items-center pointer-events-none">
                        <img class="w-[22.7px] h-[22.7px]" src="{{asset('images/search-icon.png')}}" alt="Search Icon">
                    </div>
            </div>

            <div class="flex justify-between pt-[52px] pb-[18.5px]">
                <p class="text-[20px] font-semibold">Cattle Speciality</p>
                <button class="text-[16px] text-semibold text-[#A4907C]">View All ></button>
            </div>

            <div class="flex justify-center w-[1200px] pb-[10px]">
                <div class="border-r-2 border-[#F1DEC9] pr-[20px] py-[20.5px]">
                    <x-consulservice
                        doctorImage="images/temp-doctor.png" 
                        alt="dokter_image" 
                        name="Drh. Putri Nadia Lumbantoruan" 
                        specialist="Cattle Specialist" 
                        experience="4 Tahun"
                        price="Rp 90.000"
                    />
                </div>

                <div class="border-r-2 border-[#F1DEC9] px-[20px] py-[20.5px]">
                    <x-consulservice
                        doctorImage="images/temp-doctor.png" 
                        alt="dokter_image" 
                        name="Drh. Putri Nadia Lumbantoruan" 
                        specialist="Cattle Specialist" 
                        experience="4 Tahun"
                        price="Rp 90.000"
                    />
                </div>

                <div class="pl-[24px] py-[20.5px]">
                    <x-consulservice
                        doctorImage="images/temp-doctor.png" 
                        alt="dokter_image" 
                        name="Drh. Putri Nadia Lumbantoruan" 
                        specialist="Cattle Specialist" 
                        experience="4 Tahun"
                        price="Rp 90.000"
                    />
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center pt-[32px]">
        <div class="border-b-2 border-[#F1DEC9]">
            <div class="flex justify-between pb-[18.5px]">
                <p class="text-[20px] font-semibold">Poultry Speciality</p>
                <button class="text-[16px] text-semibold text-[#A4907C]">View All ></button>
            </div>

            <div class="flex justify-center w-[1200px] pb-[10px]">
                <div class="border-r-2 border-[#F1DEC9] pr-[20px] py-[20.5px]">
                    <x-consulservice
                        doctorImage="images/temp-doctor.png" 
                        alt="dokter_image" 
                        name="Drh. Putri Nadia Lumbantoruan" 
                        specialist="Cattle Specialist" 
                        experience="4 Tahun"
                        price="Rp 90.000"
                    />
                </div>

                <div class="border-r-2 border-[#F1DEC9] px-[20px] py-[20.5px]">
                    <x-consulservice
                        doctorImage="images/temp-doctor.png" 
                        alt="dokter_image" 
                        name="Drh. Putri Nadia Lumbantoruan" 
                        specialist="Cattle Specialist" 
                        experience="4 Tahun"
                        price="Rp 90.000"
                    />
                </div>

                <div class="pl-[24px] py-[20.5px]">
                    <x-consulservice
                        doctorImage="images/temp-doctor.png" 
                        alt="dokter_image" 
                        name="Drh. Putri Nadia Lumbantoruan" 
                        specialist="Cattle Specialist" 
                        experience="4 Tahun"
                        price="Rp 90.000"
                    />
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center pt-[32px] pb-[40px]">
        <div class="border-b-2 border-[#F1DEC9]">
            <div class="flex justify-between pb-[18.5px]">
                <p class="text-[20px] font-semibold">Fish Speciality</p>
                <button class="text-[16px] text-semibold text-[#A4907C]">View All ></button>
            </div>

            <div class="flex justify-center w-[1200px] pb-[10px]">
                <div class="border-r-2 border-[#F1DEC9] pr-[20px] py-[20.5px]">
                    <x-consulservice
                        doctorImage="images/temp-doctor.png" 
                        alt="dokter_image" 
                        name="Drh. Putri Nadia Lumbantoruan" 
                        specialist="Cattle Specialist" 
                        experience="4 Tahun"
                        price="Rp 90.000"
                    />
                </div>

                <div class="border-r-2 border-[#F1DEC9] px-[20px] py-[20.5px]">
                    <x-consulservice
                        doctorImage="images/temp-doctor.png" 
                        alt="dokter_image" 
                        name="Drh. Putri Nadia Lumbantoruan" 
                        specialist="Cattle Specialist" 
                        experience="4 Tahun"
                        price="Rp 90.000"
                    />
                </div>

                <div class="pl-[24px] py-[20.5px]">
                    <x-consulservice
                        doctorImage="images/temp-doctor.png" 
                        alt="dokter_image" 
                        name="Drh. Putri Nadia Lumbantoruan" 
                        specialist="Cattle Specialist" 
                        experience="4 Tahun"
                        price="Rp 90.000"
                    />
                </div>
            </div>
        </div>
    </div>
    

    
</body>
</html>