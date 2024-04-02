<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmCare - Online Consultation</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

</head>
<body>

    <p class="pb-[100px]">Header</p>

    <div class="flex justify-center bg-primary_color h-[539px]">
        <div class="text-center text-[24px]">
            <p class="pt-[32px] font-bold">Consult with a doctor at FarmCare+</p>
            <p class="py-[16px]">Telemedicine services are ready to help care for your <br>livestock animals</p>
            <img src="{{asset('images/consultation-desc-image.png')}}" alt="online consultation" class="pt-[10px] mx-auto">
        </div>
        
    </div>

    <div class="flex pt-[40px] pb-[28px]">
        <div class="pl-[96px] border-y-2 pr-[40px] py-[43px] ">
            <p class="text-[20px] font-medium">Why consult a doctor at FarmCare+?</p>
            <ol class="list-decimal">
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
            </ol>
        </div>

        <div class="flex-grow border-y-2 border-l-2 pl-[48px] pr-[91px] pt-[26px] pb-[56px]">
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

                <div class="border-r-2 border-[#F1DEC9] px-[24px] py-[20.5px]">
                <x-consulservice
                    doctorImage="images/temp-doctor.png" 
                    alt="dokter_image" 
                    name="Drh. Putri Nadia Lumbantoruan" 
                    specialist="Cattle Specialist" 
                    experience="4 Tahun"
                    price="Rp 90.000"
                />
                </div>

                <div class="border-r-2 border-[#F1DEC9] px-[24px] py-[20.5px]">
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