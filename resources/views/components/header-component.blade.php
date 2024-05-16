<header class="bg-white py-[16px] px-[52px] fixed top-0 w-full z-10 border-b-2">
    <div class="flex justify-between items-center">
        <div class="flex">
            <a href="">
                <img src="{{ asset('images/farmcare-logo.png') }}" alt="Farmcare Logo" class="w-[144px] h-[72px]">
            </a>

            <div class="flex items-center">
                <ul class="menu menu-horizontal px-1 font-medium text-[20px] pl-[64px]">
                    <li><a>Home</a></li>
                    <li class="px-[62px]">
                        <details>
                        <summary>
                            Service
                        </summary>
                        <ul class="p-2 bg-base-150 rounded-t-none drop-shadow-xl">
                            <li><a>Online Consultation</a></li>
                            <li><a>Offline Reservation</a></li>
                        </ul>
                        </details>
                    </li>
                    <li><a>Contact Us</a></li>
                </ul>
            </div>

        </div>

        <div class="flex pr-[12px] items-center">
            <img src="{{asset('images/profile-icon.png')}}" alt="">
            <p class="pl-[15.92px] font-medium text-[20px]">Hi, {{ $userName }}</p>
        </div>
    </div>
    
   
</header>