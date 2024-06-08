<header class="bg-shadeBrown px-16 py-3 fixed top-0 w-full z-40 border-b-2">
    <div class="flex justify-between items-center">
        <a href="{{route('veterinarian.index')}}">
            <img src="{{ asset('images/assets/farmcare-logo.svg') }}" alt="Farmcare Logo">
        </a>
            
        <ul class="menu menu-horizontal px-1 ml-10">
            <li>
                <details>
                <summary>
                    <div class="flex items-center">
                        @if(Auth::guard('veterinarian')->user()->photo)
                            <img src="{{asset(Auth::guard('veterinarian')->user()->photo)}}" alt="profile-image" class="size-10 rounded-full">
                        @else
                            <img src="{{asset('images/icon/doctor-profile-icon.svg')}}" alt="profile-image">
                        @endif
                        <div class="mx-6 font-bold text-base text-white">
                            <p>{{Auth::guard('veterinarian')->user()->gender === "male" ? 'Dr.' . Auth::guard('veterinarian')->user()->name : 'Dra.' . Auth::guard('veterinarian')->user()->name}}</p>
                            <p>{{Auth::guard('veterinarian')->user()->specialist}} Specialist</p>
                        </div>
                    </div>
                </summary>
                <ul class="p-2 bg-gray-100 rounded-t-none drop-shadow-xl">
                    <li><a href="{{route('logout')}}" class="px-12">Logout</a></li>
                </ul>
                </details>
            </li>
        </ul>
        
    </div>
</header>